<?php

namespace App\Validations\Reticulas;

use App\Controllers\Reticulas\ReticulasAux;
use App\Models\Reticulas\EstatusModel;
use App\Models\Reticulas\ReticulaModel;
use Exception;

/**
 * Clase que contienes las relgas personalizadas para gestionar reticulas
 */
class CustomRulesReticulas
{
    /**
     * Regla para validar si una reticula puede ser eliminada
     * (Una reticula solo puede ser eliminada si esta en el estado de borrador)
     *
     */
    public function isCanDeleteReticula($value, string $params = null, array $data = null, string &$error = null): bool
    {
        $nameStatusForDelete = 'Borrador';
        $modelReticulas = new ReticulaModel();
        $modelStatus = new EstatusModel();

        // Obtenemos la reticula
        $reticula = $modelReticulas->find($value);

        // Si la reticula no existe
        if ($reticula === null) {
            return true;
        }

        // Obtenemos el id de estatus para eliminar
        $idStatusBorrador = $modelStatus->getIdByEstatus($nameStatusForDelete);
        if ($idStatusBorrador === null) {
            throw new Exception('No se encontro el estatus en la Base de Datos', 500);
        }

        // Evaluamos si la reticula tienes el estado correcto para ser eliminada
        if ($reticula->estatus === $idStatusBorrador) {
            return true;
        }

        return false;
    }

    /**
     * Regla para validar si una reticula cumple con las reglas de creditos
     */
    public function validateCreditsReticula($value, string $params = null, array $data = null, string &$error = null): bool
    {
        $modelReticulas = new ReticulaModel();
        $reticulasAux = new ReticulasAux();

        // Reglas de validación
        $maxCreditsBySemestre = 45;
        $minCreditsBySemestre = 10;
        $maxCreditsByReticula = 270;

        // Obtenemos la reticula
        $reticula = $modelReticulas->find($value);

        // Si la reticula no existe
        if ($reticula === null) {
            throw new Exception('La reticula no existe', 500);
        }

        // Obtenemos el JSON de la reticula
        $reticulaJson = $reticula->reticula_json;

        // Si el Json de la reticula no existe
        if ($reticulaJson === null) {
            throw new Exception('El JSON de la reticula no esta definido', 500);
        }

        // Renderizamos el json para saber cuantos creditos totales y por semestre tiene la reticula
        $reticulaData = json_decode($reticulasAux->getReticulaJSON($reticula->id_reticula));

        // Evaluamos si no excede el número de creditos maximo por reticula
        if ($reticulaData->totalCreditos > $maxCreditsByReticula) {
            return false;
        }

        // Evaluamos que se cumplan las reglas de creditos por semestre
        $isValid = true;
        $num = 1;
        $semestre = 'semestre' . $num;
        while (isset($reticulaData->$semestre)) {
            if (!property_exists($reticulaData->$semestre, 'totalCreditos')) {
                $isValid = false;

                break;
            }
            $totalCreditosSemestre = $reticulaData->$semestre->totalCreditos;
            if ($totalCreditosSemestre > $maxCreditsBySemestre) {
                $isValid = false;

                break;
            }
            if ($totalCreditosSemestre < $minCreditsBySemestre) {
                $isValid = false;

                break;
            }
            $num++;
            $semestre = 'semestre' . $num;
        }

        return $isValid;
    }

    /**
     * Regla para validar que no se exceda el número de maximo de reticulas publicadas (maximo 3)
     */
    public function maxNumReticulas($value, string $params = null, array $data = null, string &$error = null): bool
    {
        $modelReticulas = new ReticulaModel();
        $modelStatus = new EstatusModel();

        $reticula = $modelReticulas->find($value);

        $idCarrera = $reticula->id_carrera;

        $filters = [
            'id_carrera' => $idCarrera,
            'estatus' => $modelStatus->getIdByEstatus('Activo'),
        ];

        $numReticulas = sizeof($modelReticulas->where($filters)->find());

        if ($numReticulas < 3) {
            return true;
        }

        return false;
    }

    /**
     * Regla para validar si un alumno aun esta cursando una reticula
     */
    public function hasntActiveAlumnos($value, string $params = null, array $data = null, string &$error = null): bool
    {
        // TO DO: Se debe validar si existen alumnos activos cursando esta reticula
        return true;
    }
}
