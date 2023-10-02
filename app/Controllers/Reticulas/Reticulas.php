<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use App\Models\Reticulas\ReticulaModel;
use CodeIgniter\HTTP\Response;

class Reticulas extends BaseController
{
    protected $reticulaModel;

    public function __construct()
    {
        $this->reticulaModel = new ReticulaModel();
    }

    public function reticulas()
    {
        dd($this->reticulaModel->find());
    }
}
