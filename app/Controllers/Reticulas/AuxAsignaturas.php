<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaCarreraModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use Exception;

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
                    'clave_asignatura' => $asignatura['clave_asignatura'],
                    'nombre_asignatura' => $asignatura['nombre_asignatura'],
                    'horas_teoricas' => $asignatura['horas_teoricas'],
                    'horas_practicas' => $asignatura['horas_practicas'],
                ];

                array_push($asignaturasBasicas, $data);
            }
        }

        return $asignaturasBasicas;
    }

    /**
     * Método para obtener las asignaturas de una carrera
     *
     * @return array|null
     */
    public function getAsignaturasByCarrera($id = null, $onlyGenericas = false)
    {
        try {
            $asignaturasGenericas = [];

            $asignaturaCarreraRelationship = $this->asigntauraCarreraModel->find();

            foreach ($asignaturaCarreraRelationship as $relationship) {
                $carrera = $this->carreraModel->find($relationship['id_carrera']);
                $asignatura = $this->asignaturaModel->find($relationship['id_asignatura']);
                if ($asignatura === null) {
                    continue;
                }
                $data = [
                    'id_asignatura' => $asignatura->id_asignatura,
                    'clave_asignatura' => $asignatura->clave_asignatura,
                    'nombre_asignatura' => $asignatura->nombre_asignatura,
                    'horas_teoricas' => $asignatura->horas_teoricas,
                    'horas_practicas' => $asignatura->horas_practicas,
                    'id_carrera' => $carrera->id_carrera,
                    'nombre_carrera' => $carrera->nombre_carrera,
                ];

                if ($id != null) {
                    if ($onlyGenericas && $id == $relationship['id_carrera']) {
                        // Materias solo de la carrera (solo genericas de una carrera)
                        if ($asignatura->id_tipo_asignatura == 2) {
                            array_push($asignaturasGenericas, $data);
                        }
                    } elseif ($id == $relationship['id_carrera']) {
                        // Materias de la carrera (basicas y genericas)
                        array_push($asignaturasGenericas, $data);
                    }
                } else {
                    array_push($asignaturasGenericas, $data);
                }
            }

            return $asignaturasGenericas;
        } catch (Exception $e) {
            log_message('error', $e->getMessage());

            return null;
        }
    }

    /**
     * Método para obtener las asignaturas de una especialidad
     *
     * @return array|null
     */
    public function getAsignaturasByEspecialidad($id = null)
    {
        try {
            $asignaturaEspecialidadRelationship = $this->asignaturaEspecialidadModel->find();
            $asignaturasEspecificas = [];

            foreach ($asignaturaEspecialidadRelationship as $relationship) {
                $asignatura = $this->asignaturaModel->find($relationship['id_asignatura']);
                if ($asignatura === null) {
                    continue;
                }
                $especialidad = $this->especialidadModel->find($relationship['id_especialidad']);
                $carrera = $this->carreraModel->find($especialidad->id_carrera);

                $data = [
                    'id_asignatura' => $asignatura->id_asignatura,
                    'clave_asignatura' => $asignatura->clave_asignatura,
                    'nombre_asignatura' => $asignatura->nombre_asignatura,
                    'horas_teoricas' => $asignatura->horas_teoricas,
                    'horas_practicas' => $asignatura->horas_practicas,
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
        } catch (Exception $e) {
            log_message('error', $e->getMessage());

            return null;
        }
    }

    public function getByClave($clave)
    {
        return $this->asignaturaModel->where('clave_asignatura', $clave)->find()[0]->toArray();
    }

    public function assignToCarrera($idCarrera, $idAsignatura)
    {

        

    }
}
