<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use App\Models\Reticulas\EstatusModel;
use Exception;

class Reticulas extends CrudController
{
    protected $asignaturaModel;
    protected $carreraModel;
    protected $especialidadModel;
    protected $estatusModel;
    protected $reticulasAux;
    protected $db;

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
        $this->reticulasAux = new ReticulasAux();
        $this->db = db_connect();
    }

    /**
     * Funcion AJAX para publicar una reticula
     */
    public function publishReticula()
    {
        $this->db->transStart();

        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestPublishReticula')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Publicamos la reticula
            $idReticula = $this->request->getPost('id_reticula');
            $this->reticulasAux->publishReticula($idReticula);

            $this->db->transCommit();

            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['success' => true]);
        } catch (Exception $e) {
            $this->db->transRollback();

            log_message('error', $e->getMessage());

            $errorCode = $e->getCode();
            if ($errorCode === 0) {
                $errorCode = 500;
            }

            return $this->response->setStatusCode($errorCode)
                                  ->setJSON(['error' => $e->getMessage(), 'success' => false]);
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

            // TO DO: Hacer la validacion del nombre
            $name = $dataJsonRet->name;

            // Eliminamos la propiedad name del json
            unset($dataJsonRet->name);

            // Hacemos la actualizacion
            $dataUpdateReticula = [
                'nombre_reticula' => $name,
                'reticula_json' => json_encode($dataJsonRet),
            ];
            $isUpdated = $this->model->update($idRet, $dataUpdateReticula);
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
        // TODO: Quitar comentatio para comprobar que sea request AJAX
        // TODO: Poner el JSON enviado por post en la variable $json
        // TODO: Verificar que la reticula no este eliminada

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

            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'reticula' => $data]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getNoEspecialidadJSON()
    {
        // TODO: Quitar comentatio para comprobar que sea request AJAX
        // TODO: Poner el JSON enviado por post en la variable $json
        try {
            // if (!$this->request->isAJAX()) {
            //     throw new Exception('No se encontró el recurso', 404);
            // }

            $json = '
            {"name":"ISIC-DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES","idCarrera":1,"idEspecialidad":5,"status":"Borrador","semestre1":["AED-1285","ACA-0907","AEF-1041","SCH-1024","ACC-0906","ACF-0901"],"semestre2":["ACF-0902","AED-1286","AEC-1008","AEC-1058","ACF-0903","AEF-1052"],"semestre3":["SCC-1005","SCF-1006","ACD-0908","SCC-1013","AED-1026","ACF-0904"],"semestre4":["ACF-0905","SCC-1017","SCD-1027","AEF-1031","SCD-1022","SCD-1018","SCD-1003"],"semestre5":["SCC-1010","SCC-1007","SCA-1025","AEC-1061","SCC-1019","SCD-1015","AEC-1034"],"semestre6":["SCD-1016","SCD-1021","SCA-1026","SCB-1001","SCD-1011","SCC-1014","ADD-2301"],"semestre7":["SCD-1004","ADF-2305","SCC-1023","SCG-1009","ACA-0909","AEB-1055","SCC-1012"],"semestre8":["SCA-1002","ACA-0910","DWD-2002","DWD-2001","DWD-2004"]}
            ';

            $data = $this->reticulasAux->getReticulaJSON($json, true);
            dd($data);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * Función para mostrar una lista de carreras para reticulas
     */
    public function index()
    {
        // Obtenemos la lista de carreras
        $carreras = $this->carreraModel->findAll();
        for ($i = 0; $i < count($carreras); $i++) {
            $carrera = $carreras[$i];
            $carreras[$i] = $carrera->toArray();
        }

        $data = [
            'nombreModulo' => 'Reticulas',
            'carreras' => $carreras,
        ];
        $this->twig->display('ServiciosEscolares/reticulas_carreras', $data);
    }

    /**
     * Funcion para mostrar la vista de las reticulas por carrera
     */
    public function getByCarrera($id_carrera)
    {
        // Obtener los datos de las carrera
        $carrera = $this->carreraModel->find($id_carrera)->toArray();
        $nameCarrera = $carrera['nombre_carrera'];

        $especialidades = $this->especialidadModel->getWithoutReticula($id_carrera);

        $data = [
            'nombreModulo' => $nameCarrera,
            'idCarrera' => $id_carrera,
            'especialidades' => $especialidades,
            'reticulas' => [],
            'botonAtras' => true,
        ];

        // Obtenemos los datos de las reticulas
        $reticulas = $this->model->where('id_carrera', $id_carrera)->find();
        foreach ($reticulas as $reticula) {
            $reticulaData = [];
            $reticulaData['id_reticula'] = $reticula->id_reticula;
            $reticulaData['nombre_reticula'] = $reticula->nombre_reticula;
            $reticulaData['id_carrera'] = $reticula->id_carrera;
            $reticulaData['id_especialidad'] = $reticula->id_especialidad;
            $reticulaData['estatus'] = $reticula->estatus;
            array_push($data['reticulas'], $reticulaData);
        }

        $this->twig->display('ServiciosEscolares/reticula_carrera', $data);
    }

    /**
     * Función para mostrar una reticula
     */
    public function show($id_reticula)
    {
        $this->db->transStart();

        try {
            // Rectificamos la reticula (por si se elimino alguna materia)
            $reticula = $this->model->find($id_reticula);
            $jsonRectifyReticula = $this->reticulasAux->rectifyReticula($reticula->reticula_json);
            $reticula->reticula_json = $jsonRectifyReticula;
            $isUpdated = $this->model->save($reticula);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al rectificar la reticula', 500);
            }

            // renderizamos la reticula (le agregamos la informacion de las asignaturas)
            $jsonReticulaRendered = $this->reticulasAux->getReticulaJSON($id_reticula);

            $data = [
                'nombreModulo' => 'Visor de reticulas',
                'jsonReticula' => $jsonReticulaRendered,
            ];

            $this->db->transCommit();

            $this->twig->display('ServiciosEscolares/reticulas', $data);
        } catch (Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());

            // Devolver la vista 500;
            $this->twig->display('errors/error500');
        }
    }

    /**
     * Función para crear una reticula
     */
    public function create()
    {
        $this->db->transStart();

        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();

            if (!$this->validation->run($data, 'reticula')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos los datos de la nueva reticula
            $name = $this->request->getPost('nombre_reticula');
            $idCarrera = $this->request->getPost('id_carrera');
            $idEspecialidad = $this->request->getPost('id_especialidad');
            $idStatus = $this->estatusModel->getIdByEstatus('Borrador');

            // Creamos la nueva reticula
            $data = [
                'nombre_reticula' => $name,
                'id_carrera' => $idCarrera,
                'id_especialidad' => $idEspecialidad,
                'estatus' => $idStatus,
            ];
            $entity = new $this->entity();
            $entity->fill($data);
            $isSaved = $this->model->save($entity);

            if (!$isSaved) {
                throw new Exception('Error al crear la reticula en la BD', 500);
            }

            // Obtenemos el id de la nueva reticula
            $idReticula = $this->model->insertID();

            // Creamos el JSON que representa la reticula
            $newReticula = filter_var($this->request->getPost('newReticula'), FILTER_VALIDATE_BOOLEAN);

            if ($newReticula) {
                // Creamos una reticula en blanco
                $jsonReticula = $this->reticulasAux->createBlankReticula();
            } else {
                // Creamos una reticula a partir de otra
                $idBaseReticula = $this->request->getPost('useReticula');
                $baseReticula = $this->model->find($idBaseReticula)->toArray();
                $baseJson = $baseReticula['reticula_json'];
                // Removemos las materias de especialidad de la reticula base
                $jsonReticula = $this->reticulasAux->removeAsignaturasEspFromJson($baseJson);
            }

            // Guardamos el json de la reticula en BD
            $isUpdated = $this->model->update($idReticula, ['reticula_json' => json_encode($jsonReticula)]);

            if (!$isUpdated) {
                throw new Exception('Error al crear el JSON reticula en la BD', 500);
            }

            $urlNewReticulaAcces = base_url('reticulas/show/' . $idReticula);

            $this->db->transCommit();

            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['success' => true, 'urlNewReticula' => $urlNewReticulaAcces]);
        } catch (Exception $e) {
            $this->db->transRollback();

            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * Función para eliminar una reticula
     */
    public function delete()
    {
        $this->db->transStart();

        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestDeleteReticula')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Eliminamos la reticula fisicamente
            $idReticula = $this->request->getPost('id_reticula');
            $reticula = $this->model->find($idReticula);
            $isDeleted = $this->model->delete($idReticula, true);
            if (!$isDeleted) {
                throw new Exception('Hubo un error al eliminar la reticula', 500);
            }

            $this->db->transCommit();

            // Retornamos las nuevas especialidades disponibles
            $especialidades = $this->especialidadModel->getWithoutReticula($reticula->id_carrera);

            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['success' => true, 'especialidades' => $especialidades]);
        } catch (Exception $e) {
            $this->db->transRollback();

            return $this->response
                        ->setStatusCode($e->getCode())
                        ->setJSON(['error' => $e->getMessage(), 'success' => false]);
        }
    }

    /**
     * Función para cambiar el estatus de una reticula de activo -> inactivo
     */
    public function changeStatusToInactive()
    {
        $this->db->transStart();

        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'existReticula')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            $nameNewStatus = 'Inactivo';
            $idReticula = $this->request->getPost('id_reticula');
            $reticula = $this->model->find($idReticula);
            $idEspecialidad = $reticula->id_especialidad;
            $idStatusInactive = $this->estatusModel->getIdByEstatus($nameNewStatus);

            // Actualizamos el estatus de la reticula
            $reticula->estatus = $idStatusInactive;
            $isUpdated = $this->model->save($reticula);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al actualizar el estatus la reticula', 500);
            }

            // Actualizamos el estatus de la especialidad
            $isUpdated = $this->especialidadModel->changeStatus($idEspecialidad, $nameNewStatus);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al actualizar el estatus la especialidad de la reticula', 500);
            }

            // TODO: Actualizar el estado de la carrera tambien si no existe otra reticula activa

            $this->db->transCommit();

            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['success' => true]);
        } catch (Exception $e) {
            $this->db->transRollback();

            return $this->response
                        ->setStatusCode($e->getCode())
                        ->setJSON(['error' => $e->getMessage(), 'success' => false]);
        }
    }

    /**
     * Función para cambiar el estatus de una reticula de inactivo -> historial
     */
    public function changeStatusToHistorial()
    {
        $this->db->transStart();

        try {
            // Validar que sea una peticion AJAX
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos los datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestChangeStatusToHistorial')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            $nameNewStatus = 'Historial';
            $idReticula = $this->request->getPost('id_reticula');
            $reticula = $this->model->find($idReticula);
            $idEspecialidad = $reticula->id_especialidad;
            $idStatusHistorial = $this->estatusModel->getIdByEstatus($nameNewStatus);

            // Actualizamos el estatus de la reticula
            $isUpdated = $this->model->update($idReticula, ['estatus' => $idStatusHistorial]);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al actualizar el estatus la reticula', 500);
            }

            // Eliminamos la reticula de manera logica
            $isDeleted = $this->model->delete($idReticula);
            if (!$isDeleted) {
                throw new Exception('Hubo un error al eliminar la reticula', 500);
            }

            // Actualizamos el estatus de la especialidad
            $isUpdated = $this->especialidadModel->changeStatus($idEspecialidad, $nameNewStatus);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al actualizar el estatus de la especialidad de la reticula', 500);
            }

            // Eliminamos la especialidad de manera logica
            $isDeleted = $this->especialidadModel->deleteWithAsignaturas($idEspecialidad);
            if (!$isDeleted) {
                throw new Exception('Hubo un error al eliminar la especialidad de la reticula', 500);
            }

            $this->db->transCommit();

            return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['success' => true]);
        } catch (Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());

            return $this->response
                        ->setStatusCode($e->getCode())
                        ->setJSON(['error' => $e->getMessage(), 'success' => false]);
        }
    }

    public function test($id)
    {
        //dd('Hola');
        $data = $this->reticulasAux->testing($id);
        dd($data);
    }

    public function reticulas()
    {
        // Funcion de test para ver una reticula con la herramienta de reticulas
        $this->twig->display('Test/Reticulas/reticulas');
    }
}
