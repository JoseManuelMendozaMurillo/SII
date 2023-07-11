<?php

namespace App\Controllers\Aspirantes;

use App\Controllers\BaseController;

class Aspirantes extends BaseController {

    public function apirantes()
    {
        $this->twig->display('Apirantes/aspirantes');
    }

}