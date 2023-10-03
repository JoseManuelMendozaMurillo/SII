<?php

namespace App\Controllers\Reticulas;

// Asignaturas controller

class Asignaturas extends CrudController
{
    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\AsignaturaModel',
            'App\Entities\Reticulas\Asignatura',
            'asignatura'
        );
    }
}
