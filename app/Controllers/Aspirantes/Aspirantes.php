<?php

namespace App\Controllers\Aspirantes;

use App\Controllers\BaseController;

class Aspirantes extends BaseController
{
    public function aspirantes()
    {
        $this->twig->display('Aspirantes/aspirantes');
    }
}
