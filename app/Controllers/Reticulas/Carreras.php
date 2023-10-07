<?php

namespace App\Controllers\Reticulas;

class Carreras extends CrudController
{
    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\CarreraModel',
            'App\Entities\Reticulas\Carrera',
            'carrera'
        );
    }
}
