<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use App\Models\Reticulas\EstatusModel;
use App\Models\Reticulas\ReticulaModel;
use Exception;

class Reticulas extends CrudController
{
    protected $asignaturaModel;
    protected $carreraModel;
    protected $especialidadModel;
    protected $estatusModel;
    protected $reticulaModel;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\ReticulaModel',
            'App\Entities\Reticulas\Reticula',
            'reticula',
            'App\OperationValidators\Reticulas\ReticulaValidator',
        );

        $this->asignaturaModel = new AsignaturaModel();
        $this->carreraModel = new CarreraModel();
        $this->estatusModel = new EstatusModel();
        $this->especialidadModel = new EspecialidadModel();
        $this->reticulaModel = new ReticulaModel();
    }

    public function publishReticula()
    {
        try {
            // if (!$this->request->isAJAX()) {
            //     throw new Exception('No se encontró el recurso', 404);
            // }

            // $json = $this->request->getPost('reticula_data');
            // $json = $json->toStr

            $json = '
            {"name":"ISIC-DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES","idCarrera":1,"idEspecialidad":5,"status":"Borrador","semestre1":["AED-1285","ACA-0907","AEF-1041","SCH-1024","ACC-0906","ACF-0901"],"semestre2":["ACF-0902","AED-1286","AEC-1008","AEC-1058","ACF-0903","AEF-1052"],"semestre3":["SCC-1005","SCF-1006","ACD-0908","SCC-1013","AED-1026","ACF-0904"],"semestre4":["ACF-0905","SCC-1017","SCD-1027","AEF-1031","SCD-1022","SCD-1018","SCD-1003"],"semestre5":["SCC-1010","SCC-1007","SCA-1025","AEC-1061","SCC-1019","SCD-1015","AEC-1034"],"semestre6":["SCD-1016","SCD-1021","SCA-1026","SCB-1001","SCD-1011","SCC-1014","ADD-2301"],"semestre7":["SCD-1004","ADF-2305","SCC-1023","SCG-1009","ACA-0909","AEB-1055","SCC-1012"],"semestre8":["SCA-1002","ACA-0910","DWD-2002","DWD-2001","DWD-2004"]}
            ';

            // dd($json);
            $reticulaData = json_decode($json);
            // dd($reticulaData);
            $idCarrera = $reticulaData->idCarrera;
            $idEspecialidad = $reticulaData->idEspecialidad;

            // Da de alta la carrera
            $carrera = $this->carreraModel->find($idCarrera);
            if ($carrera->estatus == 1) {
                $carrera->estatus = 2;
                $this->carreraModel->save($carrera);
                $message = 'Cambio de estatus en carrera: {"id_carrera": "' . $carrera->id_carrera . '", "estatus": "2"}';
                log_message('info', $message);
            }

            // Da de alta la especialidad
            $especialidad = $this->especialidadModel->find($idCarrera);
            if ($especialidad->estatus == 1) {
                $especialidad->estatus = 2;
                $this->especialidadModel->save($especialidad);
                $message = 'Cambio de estatus en especialidad: {"id_especialidad": "' . $especialidad->id_especialidad . '", "estatus": "2"}';
                log_message('info', $message);
            }

            $num = 1;
            $semestre = 'semestre' . $num;

            // Da de alta las materias
            while (isset($reticulaData->$semestre)) {
                foreach ($reticulaData->$semestre as $asignaturaClave) {
                    // d($asignaturaClave);
                    $asignatura = $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];
                    if ($asignatura->estatus != 1) {
                        continue;
                    }
                    // d($asignatura);
                    $asignatura->estatus = '2';
                    // $asignatura = $asignatura->toArray();
                    $this->asignaturaModel->save($asignatura);
                    $message = 'Cambio de estatus en asignatura: {"id_asignatura": "' . $asignatura->id_asignatura . '", "estatus": "2"}';
                    log_message('info', $message);
                    // d($asignatura);
                }
                $num++;
                $semestre = 'semestre' . $num;
            }
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * Función AJAX para guardar el JSON de una reticula
     *
     * @param idReticula - Id de la reticula
     * @param reticulaJson - Json que representa la reticula
     */
    public function saveJsonReticula()
    {
        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestSaveJsonReticula')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos los datos
            $idRet = $this->request->getPost('idReticula');
            $jsonRet = $this->request->getPost('jsonReticula');

            /* Validamos los datos de la reticula */
            $dataJsonRet = json_decode((string) $jsonRet);
            // Validamos el estatus
            $estatus = $dataJsonRet->status;
            $idEstatus = $this->estatusModel->getIdByEstatus($estatus);
            if ($idEstatus === null) {
                throw new Exception('El estatus de la reticula no es invalido', 400);
            }
            // Validamos el nombre de la reticula
            $name = $dataJsonRet->name;
            // TO DO: Hacer la validacion del nombre

            // Hacemos la actualizacion
            $dataUpdateReticula = [
                'nombre_reticula' => $name,
                'estatus' => $idEstatus,
                'reticula_json' => $jsonRet,
            ];
            $isUpdated = $this->reticulaModel->update($idRet, $dataUpdateReticula);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al actualizar el JSON de la reticula', 500);
            }

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
    * Función AJAX para renderizar y enviar el JSON de la reticula
    *
    * @param idReticula - Id de la reticula
    *
     * @return reticulaJson - JSON de la reticula renderizado
    */
    public function getReticulaJSON()
    {
        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestGetReticulaJson')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // TO DO: Ejecutar el rectificador de la reticula

            $idReticula = $this->request->getPost('idReticula');
            $reticula = $this->model->find($idReticula);

            // Obtenemos los datos de la reticula
            $json = $reticula->reticula_json;
            $name = $reticula->nombre_reticula;
            $status = $this->estatusModel->getEstatusById($reticula->estatus);
            $idCarrera = $reticula->id_carrera;
            $idEspecialidad = $reticula->id_especialidad;

            $reticulaData = json_decode($json);
            $data = [];

            $data['name'] = $name;
            $data['idCarrera'] = $idCarrera;
            $data['idEspecialidad'] = $idEspecialidad;
            $data['status'] = $status;
            $data['totalCreditos'] = 0;

            $num = 1;
            $semestre = 'semestre' . $num;

            // Construccion de los semestres
            while (isset($reticulaData->$semestre)) {
                if (is_array(($reticulaData->$semestre))) {
                    $data[$semestre] = [];
                    $data[$semestre]['materias'] = [];
                    $data[$semestre]['totalCreditos'] = 0;
                    foreach ($reticulaData->$semestre as $asignaturaClave) {
                        $asignatura = $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];

                        $asignaturadata = [];
                        $asignaturadata['name'] = $asignatura->nombre_asignatura;

                        $asignaturadata['horasTeoricas'] = (int) $asignatura->horas_teoricas;
                        $asignaturadata['horasPracticas'] = (int) $asignatura->horas_practicas;
                        $creditosTotalesAsignatura = (int) $asignatura->horas_teoricas + (int) $asignatura->horas_practicas;
                        $data['totalCreditos'] += $creditosTotalesAsignatura;

                        $data[$semestre]['materias'][$asignatura->clave_asignatura] = $asignaturadata;
                        $data[$semestre]['totalCreditos'] += $creditosTotalesAsignatura;
                    }
                } else {
                    $data[$semestre] = json_decode('{}');
                }
                $num++;
                $semestre = 'semestre' . $num;
            }
            //dd(json_encode($data));
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'reticula' => $data]);
        } catch (Exception $e) {
            //dd($e);
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function rectifyReticula()
    {
        $json = '
        {"name":"ISIC-DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES","idCarrera":1,"idEspecialidad":5,"status":"Borrador","semestre1":["AEX-1285","ACx-0907","AEx-1041","SCH-1024","ACC-0906","ACF-0901"],"semestre2":["ACF-0902","AED-1286","AEC-1008","AEC-1058","ACF-0903","AEF-1052"],"semestre3":["SCC-1005","SCF-1006","ACD-0908","SCC-1013","AED-1026","ACF-0904"],"semestre4":["ACF-0905","SCC-1017","SCD-1027","AEF-1031","SCD-1022","SCD-1018","SCD-1003"],"semestre5":["SCC-1010","SCC-1007","SCA-1025","AEC-1061","SCC-1019","SCD-1015","AEC-1034"],"semestre6":["SCD-1016","SCD-1021","SCA-1026","SCB-1001","SCD-1011","SCC-1014","ADD-2301"],"semestre7":["SCD-1004","ADF-2305","SCC-1023","SCG-1009","ACA-0909","AEB-1055","SCC-1012"],"semestre8":["SCA-1002","ACA-0910","DWD-2002","DWD-2001","DWD-2004"]}
        ';

        $reticulaData = json_decode($json);
        d($reticulaData->semestre1[0]);

        $num = 1;
        $semestre = 'semestre' . $num;

        // Da de alta las materias
        while (isset($reticulaData->$semestre)) {
            foreach ($reticulaData->$semestre as $asignaturaClave) {
                // d($asignaturaClave);
                try {
                    $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];
                } catch (Exception) {
                    d('Asignatura no encontrada');
                    // d($key);
                    $index = array_search($asignaturaClave, $reticulaData->$semestre);
                    d($index);
                    unset($reticulaData->$semestre[$index]);
                    // array_values($reticulaData->$semestre);
                }
            }
            $reticulaData->$semestre = array_values($reticulaData->$semestre);
            $num++;
            $semestre = 'semestre' . $num;
        }

        // TODO: Guardar reticula en DB
        // dd($reticulaData);
        dd(json_encode($reticulaData));
        dd($reticulaData->semestre1);
    }
}
