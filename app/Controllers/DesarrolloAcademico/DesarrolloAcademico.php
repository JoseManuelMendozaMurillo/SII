<?php

namespace App\Controllers\DesarrolloAcademico;

use App\Controllers\BaseController;

class DesarrolloAcademico extends BaseController
{
    public function hello()
    {
        echo 'Hello academicos';
    }

    public function listaAspirantes()
    {
        $this->twig->display('DesarrolloAcademico/lista_aspirantes');
    }
}
