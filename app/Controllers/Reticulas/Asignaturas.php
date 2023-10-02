<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use CodeIgniter\HTTP\Response;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Asignaturas extends BaseController
{
    public function asignatura()
    {
        return 'hola asignaturas';
    }

    public function index()
    {
        return 'hola';
    }
}
