<?php

namespace App\Validations\Reticulas;

use App\Controllers\Reticulas\ReticulasAux;
use App\Models\Reticulas\AsignaturaCarreraModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EstatusModel;
use App\Models\Reticulas\ReticulaModel;
use Exception;

class CustomRulesasignaturas
{
    /**
     * Regla para validar si una asignatura puede ser eliminada
     * (Una asignatura solo puede ser eliminada si esta en el estado de borrador)
     *
     */
    public function isCanDeleteasignatura($value, string $params = null, array $data = null, string &$error = null): bool
    {
        $nameStatusForDelete = 'Borrador';
        $modelAsignaturas = new AsignaturaModel();
        $modelStatus = new EstatusModel();

        // Obtenemos la asignatura
        $asignatura = $modelAsignaturas->find($value);

        // Si la asignatura no existe
        if ($asignatura === null) {
            return true;
        }

        // Obtenemos el id de estatus para eliminar
        $idStatusBorrador = $modelStatus->getIdByEstatus($nameStatusForDelete);
        if ($idStatusBorrador === null) {
            throw new Exception('No se encontro el estatus en la Base de Datos', 500);
        }

        // Evaluamos si la asignatura tienes el estado correcto para ser eliminada
        if ($asignatura->estatus === $idStatusBorrador) {
            return true;
        }

        return false;
    }

    public function canUpdateStatusGeneral($value, string $params = null, array $data = null, string &$error = null): bool
    {
        // TODO: Comprobar funcionamiento
        $modelAsignaturas = new AsignaturaModel();
        $asignatura = $modelAsignaturas->find($value);

        $type = $asignatura->id_tipo_asignatura;

        if ($type != 1) {
            throw new Exception('La asignatura no es de tipo "Básica"');
        }

        $asignaturasCarreraModel = new AsignaturaCarreraModel();
        $asignaturasCarrera = $asignaturasCarreraModel->where('id_asignatura', $asignatura->id_asignatura)->find();
        $num = sizeof($asignaturasCarrera);

        if ($num == 0) {
            return true;
        }

        $modelCarrera = new CarreraModel();
        foreach ($asignaturasCarrera as $data) {
            $carrera = $modelCarrera->find($data->id_carrera);
            if ($carrera->estatus == 2) {
                return false;
            }
        }

        return true;
    }

    public function canUpdateStatusToArchive($value, string $params = null, array $data = null, string &$error = null): bool
    {
        // TODO: Comprobar funcionalidad
        $modelAsignaturas = new AsignaturaModel();
        $asignatura = $modelAsignaturas->find($value);

        $asignaturasCarreraModel = new AsignaturaCarreraModel();
        $asignaturasCarrera = $asignaturasCarreraModel->where('id_asignatura', $asignatura->id_asignatura)->find();
        $numCarrera = sizeof($asignaturasCarrera);

        $asignaturaEspecialidadModel = new AsignaturaEspecialidadModel();
        $asignaturasEspecialidad = $asignaturaEspecialidadModel->where('id_asignatura', $asignatura->id_asignatura)->find();
        $numEspecialidad = sizeof($asignaturasEspecialidad);
        if (($numCarrera + $numEspecialidad) == 0) {
            return true;
        }

        $modelCarrera = new CarreraModel();
        foreach ($asignaturasCarrera as $data) {
            $carrera = $modelCarrera->find($data->id_carrera);
            if ($carrera->estatus == 2 || $carrera->estatus == 3) {
                return false;
            }
        }

        return true;
    }
}
