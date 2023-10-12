<?php

namespace App\OperationValidators\Reticulas;

class ReticulaValidator implements OperationValidator
{
    public function __construct()
    {
    }

    public function canInsert($entity)
    {
        return true;
    }

    public function canUpdate($entity)
    {
        if (!$entity->estatus == 1) {
            return false;
        }

        return true;
    }

    public function canUpdateStatus($entity)
    {
        if (!$entity->id_tipo_asignatura == 1) {
            return false;
        }

        return true;
    }

    public function canDelete($entity)
    {
        if ($entity->estatus == 1) {
            return true;
        }

        return false;
    }
}
