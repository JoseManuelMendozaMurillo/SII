<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;

class Carreras extends BaseController
{
    public function listCarreras()
    {
        $datos = [
            'nombreModulo' => 'Carreras',
        ];

        $this->twig->display('ServiciosEscolares/carreras', $datos);
    }
}
