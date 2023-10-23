<?php

namespace App\Controllers\Reticulas;

use App\Controllers\Reticulas\CrudController;

class Especialidades extends CrudController
{
    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\EspecialidadModel',
            'App\Entities\Reticulas\Especialidad',
            'especialidad',
            'App\OperationValidators\Reticulas\EspecialidadValidator',
        );
    }

    public function getEspecialidadesNoReticula()
    {
    }
}
