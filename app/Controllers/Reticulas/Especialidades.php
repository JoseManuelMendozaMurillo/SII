<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use App\Models\Reticulas\EspecialidadModel;
use CodeIgniter\HTTP\Response;

class Especialidades extends BaseController
{
    protected $especialidadModel;

    public function __construct()
    {
        $this->especialidadModel = new EspecialidadModel();
    }

    public function especialidad()
    {
        dd($this->especialidadModel->find());
    }
}
