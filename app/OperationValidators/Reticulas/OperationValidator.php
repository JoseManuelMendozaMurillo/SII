<?php

namespace App\OperationValidators\Reticulas;

interface OperationValidator
{
    public function canInsert($entity);

    public function canUpdate($entity);

    public function canDelete($entity);
}
