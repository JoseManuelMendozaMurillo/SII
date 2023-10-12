<?php

namespace App\Controllers\Alumnos;

use App\Controllers\BaseController;
use App\Libraries\ControlNumber;
use Exception;

// Alumnos controller

class Alumnos extends BaseController
{
    private $control;

    public function __construct()
    {
        $this->control = new ControlNumber();
    }

    public function alumno()
    {
        for ($i = 0; $i < 10; $i++) {
            echo $this->control->next();
            echo '<br>';
        }
    }
}
