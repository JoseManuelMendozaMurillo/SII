<?php

namespace App\Controllers\Reticulas;

use App\Entities\Reticulas\Reticula;
use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use App\Models\Reticulas\ReticulaModel;
use App\Models\Reticulas\EstatusModel;
use App\OperationValidators\Reticulas\EspecualidadValidator;
use Exception;

use function PHPSTORM_META\type;

class ReticulasAux
{
    protected $asignaturaModel;
    protected $carreraModel;
    protected $especialidadModel;
    protected $reticulaModel;
    protected $estatusModel;

    public function __construct()
    {
        $this->asignaturaModel = new AsignaturaModel();
        $this->carreraModel = new CarreraModel();
        $this->especialidadModel = new EspecialidadModel();
        $this->reticulaModel = new ReticulaModel();
        $this->estatusModel = new EstatusModel();
    }

    public function publishReticula($json)
    {
        $json = '
            {"name":"ISIC-DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES","idCarrera":1,"idEspecialidad":5,"status":"Borrador","semestre1":["AED-1285","ACA-0907","AEF-1041","SCH-1024","ACC-0906","ACF-0901"],"semestre2":["ACF-0902","AED-1286","AEC-1008","AEC-1058","ACF-0903","AEF-1052"],"semestre3":["SCC-1005","SCF-1006","ACD-0908","SCC-1013","AED-1026","ACF-0904"],"semestre4":["ACF-0905","SCC-1017","SCD-1027","AEF-1031","SCD-1022","SCD-1018","SCD-1003"],"semestre5":["SCC-1010","SCC-1007","SCA-1025","AEC-1061","SCC-1019","SCD-1015","AEC-1034"],"semestre6":["SCD-1016","SCD-1021","SCA-1026","SCB-1001","SCD-1011","SCC-1014","ADD-2301"],"semestre7":["SCD-1004","ADF-2305","SCC-1023","SCG-1009","ACA-0909","AEB-1055","SCC-1012"],"semestre8":["SCA-1002","ACA-0910","DWD-2002","DWD-2001","DWD-2004"]}
            ';

        $reticulaData = json_decode($json);

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
                $asignatura = $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];
                if ($asignatura->estatus != 1) {
                    continue;
                }

                $asignatura->estatus = '2';

                $this->asignaturaModel->save($asignatura);
                $message = 'Cambio de estatus en asignatura: {"id_asignatura": "' . $asignatura->id_asignatura . '", "estatus": "2"}';
                log_message('info', $message);
            }
            $num++;
            $semestre = 'semestre' . $num;
        }
    }

    /**
     * Función para renderizar una reticula
     */
    public function getReticulaJSON($id_reticula, $sinEspecialidad = false)
    {
        $reticula = $this->reticulaModel->where('id_reticula', $id_reticula)->find()[0];
        // Obtenemos los datos de la reticula
        $json = json_decode($reticula->reticula_json);
        $id = $reticula->id_reticula;
        $name = $reticula->nombre_reticula;
        $status = $this->estatusModel->getEstatusById($reticula->estatus);
        $idCarrera = $reticula->id_carrera;
        $idEspecialidad = $reticula->id_especialidad;

        $data = [];

        $data['id'] = $id;
        $data['name'] = $name;
        $data['idCarrera'] = $idCarrera;
        $data['idEspecialidad'] = $idEspecialidad;
        $data['status'] = $status;
        $data['totalCreditos'] = 0;

        $num = 1;
        $semestre = 'semestre' . $num;

        while (isset($json->$semestre)) {
            if (is_array(($json->$semestre))) {
                $data[$semestre] = [];
                $data[$semestre]['materias'] = [];
                $data[$semestre]['totalCreditos'] = 0;

                foreach ($json->$semestre as $asignaturaClave) {
                    $asignatura = $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];

                    if ($sinEspecialidad && $asignatura->id_tipo_asignatura == 3) {
                        continue;
                    }
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

        return json_encode($data);
    }

    public function rectifyReticula($json)
    {
        $reticulaData = json_decode($json);

        $num = 1;
        $semestre = 'semestre' . $num;

        while (isset($reticulaData->$semestre)) {
            foreach ($reticulaData->$semestre as $asignaturaClave) {
                try {
                    $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];
                } catch (Exception) {
                    $index = array_search($asignaturaClave, $reticulaData->$semestre);

                    unset($reticulaData->$semestre[$index]);
                }
            }
            $reticulaData->$semestre = array_values($reticulaData->$semestre);
            $num++;
            $semestre = 'semestre' . $num;
        }

        // TODO: Guardar reticula en DB

        return json_encode($reticulaData);
    }

    /**
     * Función para crear la estructura json de una reticula en blanco
     *
     * @param numSemestres - Número de semestres a agregar
     *
     * @return array
     */
    public function createBlankReticula($numSemestres = 9)
    {
        $jsonReticula = [];
        for ($i = 1; $i <= $numSemestres; $i++) {
            $jsonReticula['semestre' . $i] = json_decode('{}');
        }

        return $jsonReticula;
    }

    /**
     * Funcion para remover las asignaturas de especialidad del JSON QUE SE GUARDAN EN BD
     */
    public function removeAsignaturasEspFromJson($json)
    {
        try {
            $json = json_decode($json);

            $num = 1;
            $semestre = 'semestre' . $num;

            $newJson = [];
            while (isset($json->$semestre)) {
                if (is_array($json->$semestre)) {
                    $newJson[$semestre] = [];
                    for ($i = 0; $i < count($json->$semestre); $i++) {
                        $asignatura = $this->asignaturaModel->where('clave_asignatura', $json->$semestre[$i])->find()[0];

                        if ($asignatura->id_tipo_asignatura == 3) {
                            continue;
                        }

                        array_push($newJson[$semestre], $json->$semestre[$i]);
                    }
                } else {
                    $newJson[$semestre] = json_decode('{}');
                }

                $num++;
                $semestre = 'semestre' . $num;
            }

            return $newJson;
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), 500);
        }
    }
}
