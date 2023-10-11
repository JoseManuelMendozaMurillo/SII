<?php

namespace App\OperationValidators\Reticulas;

class CarreraValidator implements OperationValidator
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
        if ($entity->estatus == 1) {
            return true;
        }

        return false;
    }

    public function canDelete($entity)
    {
        if ($entity->estatus == 1) {
            return true;
        }

        return false;
    }
}
