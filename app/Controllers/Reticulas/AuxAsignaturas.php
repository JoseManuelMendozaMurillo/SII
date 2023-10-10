<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaCarreraModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;

class AuxAsignaturas
{
    private $asigntauraCarreraModel;
    private $asignaturaEspecialidadModel;
    private $carreraModel;
    private $especialidadModel;
    private $asignaturaModel;

    public function __construct()
    {
        $this->asigntauraCarreraModel = new AsignaturaCarreraModel();
        $this->asignaturaEspecialidadModel = new AsignaturaEspecialidadModel();
        $this->carreraModel = new CarreraModel();
        $this->especialidadModel = new EspecialidadModel();
        $this->asignaturaModel = new AsignaturaModel();
    }

    public function getAsignaturaByID($id)
    {
        return $this->asignaturaModel->find($id)->toArray();
    }

    public function getAsignaturasBasicas()
    {
        $asignaturasBasicas = [];
        $asignaturasData = $this->asignaturaModel->getAsArray();
        foreach ($asignaturasData as $asignatura) {
            if ($asignatura['id_tipo_asignatura'] == 1) {
                $data = [
                    'id_asignatura' => $asignatura['id_asignatura'],
                    'nombre_asignatura' => $asignatura['nombre_asignatura'],
                ];

                array_push($asignaturasBasicas, $data);
            }
        }

        return $asignaturasBasicas;
    }

    public function getAsignaturasByCarrera($id = null)
    {
        $asignaturasGenericas = [];

        $asignaturaCarreraRelationship = $this->asigntauraCarreraModel->find();

        foreach ($asignaturaCarreraRelationship as $relationship) {
            $carrera = $this->carreraModel->find($relationship['id_carrera']);
            $asignatura = $this->asignaturaModel->find($relationship['id_asignatura']);

            $data = [
                'id_asignatura' => $asignatura->id_asignatura,
                'nombre_asignatura' => $asignatura->nombre_asignatura,
                'id_carrera' => $carrera->id_carrera,
                'nombre_carrera' => $carrera->nombre_carrera,

            ];

            if ($id != null) {
                if ($id == $relationship['id_carrera']) {
                    array_push($asignaturasGenericas, $data);
                }
            } else {
                array_push($asignaturasGenericas, $data);
            }
        }

        return $asignaturasGenericas;
    }

    public function getAsignaturasByEspecialidad($id = null)
    {
        $asignaturaEspecialidadRelationship = $this->asignaturaEspecialidadModel->find();
        $asignaturasEspecificas = [];

        foreach ($asignaturaEspecialidadRelationship as $relationship) {
            $asignatura = $this->asignaturaModel->find($relationship['id_asignatura']);

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

            if ($id != null) {
                if ($id == $especialidad->id_especialidad) {
                    array_push($asignaturasEspecificas, $data);
                }
            } else {
                array_push($asignaturasEspecificas, $data);
            }
        }

        return $asignaturasEspecificas;
    }
}
