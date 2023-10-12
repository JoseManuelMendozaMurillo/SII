<?php

namespace App\Controllers\Alumnos;

use App\Controllers\BaseController;
use App\Libraries\ControlNumber;
use Exception;

// Alumnos controller

class Alumnos extends BaseController
{
    private $control;
    private $factory;
    private $generator;

    public function __construct()
    {
        $this->control = new ControlNumber();
        $this->factory = new \RandomLib\Factory();
        $this->generator = $this->factory->getMediumStrengthGenerator();
    }

    public function alumno()
    {
        for ($i = 0; $i < 10; $i++) {
            echo $this->generator->generateString(8);
            echo '<br>';
        }
    }
}
