<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;

class ServiciosEscolares extends BaseController
{
    public function crearReticula()
    {
        $this->twig->display('ServiciosEscolares/crear_reticula');
    }
}
