<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Reticulas\AsignaturaModel;

class Asignaturas extends BaseController
{
    protected $asignaturaModel;

    public function __construct()
    {
        $this->asignaturaModel = new AsignaturaModel();
    }

    public function asignatura()
    {
        $asignatura = $this->asignaturaModel->find();
        dd($asignatura);
    }

    public function index()
    {
        return 'hola';
    }
}
