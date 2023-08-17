<?php

namespace App\Controllers\Financieros;

use App\Controllers\BaseController;

class Financieros extends BaseController
{
    public function hello()
    {
        echo 'Hello financieros';
    }

    public function nuevosAspirantes()
    {
        $datos = ['nombreModulo' => 'Recursos Financieros'];

        $this->twig->display('RecursosFinancieros/nuevos_aspirantes', $datos);
    }
}
