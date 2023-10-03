<?php

namespace App\Controllers\Reticulas;

class Reticulas extends CrudController
{
    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\ReticulaModel',
            'App\Entities\Reticulas\Reticula',
            'reticula'
        );
    }
}
