<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;

class Reticulas extends BaseController
{
    public function index()
    {
        $data = [
            'nombreModulo' => 'Generar reticulas',
        ];
        $this->twig->display('ServiciosEscolares/reticulas', $data);
    }
}
