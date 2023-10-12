<?php

namespace App\Controllers\Reticulas;

use CodeIgniter\HTTP\Response;
use Exception;

// Asignaturas controller

class Asignaturas extends CrudController
{
    private $auxAsignaturas;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\AsignaturaModel',
            'App\Entities\Reticulas\Asignatura',
            'asignatura',
            'App\OperationValidators\Reticulas\AsignaturaValidator',
        );

        $this->auxAsignaturas = new AuxAsignaturas();
    }

    public function getAsignaturas()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            $basicas = $this->auxAsignaturas->getAsignaturasBasicas();
            $genericas = $this->auxAsignaturas->getAsignaturasByCarrera();
            $especificas = $this->auxAsignaturas->getAsignaturasByEspecialidad();

            $allData = [];

            array_push($allData, $basicas);
            array_push($allData, $genericas);
            array_push($allData, $especificas);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $allData, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * getAsignaturasBasicas
     * Función para obtener las asignaturas basicas (que se aplican a mas de una carrera)
     *
     * @return Response
     */
    public function getAsignaturasBasicas(): Response
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            $basicas = $this->auxAsignaturas->getAsignaturasBasicas();

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $basicas, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * getAsignaturasByCarrera
     * Función para obtener las asignaturas de una carrera
     *
     * @return Response
     */
    public function getAsignaturasByCarrera(): Response
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos que el id sea valido
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestGetByCarrera')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos el Id de la carrera y la bandera para obtener las materias de la carrera
            $idCarrera = $this->request->getPost('id');
            $onlyGenericas = filter_var($this->request->getPost('onlyGenericas'), FILTER_VALIDATE_BOOLEAN);

            // Obtenemos las asignaturas de la carrera
            $asignaturasByCarrera = $this->auxAsignaturas->getAsignaturasByCarrera($idCarrera, $onlyGenericas);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $asignaturasByCarrera, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * getAsignaturasByEspecialidad
     * Función para obtener las asignaturas de una especialidad
     *
     * @return Response
     */
    public function getAsignaturasByEspecialidad(): Response
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos que el id sea valido
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestGetByEspecialidad')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos el Id de la especialidad
            $idEspecialidad = $this->request->getPost('id');

            // Obtenemos las asignaturas de la especialidad
            $asignaturasByEspecialidad = $this->auxAsignaturas->getAsignaturasByEspecialidad($idEspecialidad);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $asignaturasByEspecialidad, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getByClave($clave)
    {
        dd($this->auxAsignaturas->getByClave($clave));
    }
}
