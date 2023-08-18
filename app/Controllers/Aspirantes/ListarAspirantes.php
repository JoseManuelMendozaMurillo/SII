<?php

namespace App\Controllers\Aspirantes;

use App\Models\AspiranteModel;
use CodeIgniter\Controller;

class ListarAspirantes extends Controller
{
    public function index()
    {
        $model = new AspiranteModel();

        $data['aspirantes'] = $model->findAll();

        return view('lista_aspirantes', $data);
    }
}
