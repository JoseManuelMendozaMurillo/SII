<?php

namespace App\Controllers\Reticulas;

use App\Entities\Reticulas\Especialidad;
use App\Models\Reticulas\AsignaturaCarreraModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use Exception;

// Asignaturas controller

class Asignaturas extends CrudController
{
    private $asigntauraCarreraModel;
    private $asignaturaEspecialidadModel;
    private $carreraModel;
    private $especialidadModel;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\AsignaturaModel',
            'App\Entities\Reticulas\Asignatura',
            'asignatura'
        );

        $this->asigntauraCarreraModel = new AsignaturaCarreraModel();
        $this->asignaturaEspecialidadModel = new AsignaturaEspecialidadModel();
        $this->carreraModel = new CarreraModel();
        $this->especialidadModel = new EspecialidadModel();
    }

    public function getAsignaturas()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            $asignaturaCarreraRelationship = $this->asigntauraCarreraModel->find();
            $asignaturaEspecialidadRelationship = $this->asignaturaEspecialidadModel->find();
            $asignaturasData = $this->model->getAsArray();

            $asignaturasBasicas = [];
            $asignaturasGenericas = [];
            $asignaturasEspecificas = [];

            // id_tipo_asignatura
            // 1 - Basica
            // 2 - Generica
            // 3 - Especifica
            foreach ($asignaturasData as $asignatura) {
                if ($asignatura['id_tipo_asignatura'] == 1) {
                    $data = [
                        'id_asignatura' => $asignatura['id_asignatura'],
                        'nombre_asignatura' => $asignatura['nombre_asignatura'],
                    ];

                    array_push($asignaturasBasicas, $data);
                }
            }

            foreach ($asignaturaCarreraRelationship as $relationship) {
                $asignatura = $this->model->find($relationship['id_asignatura']);
                $carrera = $this->carreraModel->find($relationship['id_carrera']);

                $data = [
                    'id_asignatura' => $asignatura->id_asignatura,
                    'nombre_asignatura' => $asignatura->nombre_asignatura,
                    'id_carrera' => $carrera->id_carrera,
                    'nombre_carrera' => $carrera->nombre_carrera,

                ];
                array_push($asignaturasGenericas, $data);
            }

            foreach ($asignaturaEspecialidadRelationship as $relationship) {
                // d($relationship);
                $asignatura = $this->model->find($relationship['id_asignatura']);

                $especialidad = $this->especialidadModel->find($relationship['id_especialidad']);
                $carrera = $this->carreraModel->find($especialidad->id_carrera);

                $data = [
                    'id_asignatura' => $asignatura->id_asignatura,
                    'nombre_asignatura' => $asignatura->nombre_asignatura,
                    'id_carrera' => $carrera->id_carrera,
                    'nombre_carrera' => $carrera->nombre_carrera,
                    'id_especialidad' => $especialidad->id_especialidad,
                    'nombre_especialidad' => $especialidad->nombre_especialidad,

                ];

                array_push($asignaturasEspecificas, $data);
            }

            $allData = [];

            array_push($allData, $asignaturasBasicas);
            array_push($allData, $asignaturasGenericas);
            array_push($allData, $asignaturasEspecificas);

            dd($allData);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $allData, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }
}
