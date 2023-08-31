<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Preguntas extends BaseController
{
    public function preguntasFrecuentes()
    {
        $this->twig->display('Layout/Template/preguntas');
    }
}
