<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use App\Models\Reticulas\CarreraModel;
use CodeIgniter\HTTP\Response;

class Carreras extends BaseController
{
    protected $carreraModel;

    public function __construct()
    {
        $this->carreraModel = new CarreraModel();
    }

    public function carrera()
    {
        dd($this->carreraModel->find());
    }
}
