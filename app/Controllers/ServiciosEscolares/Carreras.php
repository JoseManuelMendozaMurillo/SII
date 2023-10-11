<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;
use App\Models\Reticulas\CarreraModel;

class Carreras extends BaseController
{
    public function listCarreras()
    {
        // Obtenemos los datos necesarios
        $carreraModel = new CarreraModel();

        $data = $carreraModel->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        $datos = [
            'nombreModulo' => 'Carreras',
            'carreras' => $array,
        ];

        $this->twig->display('ServiciosEscolares/carreras', $datos);
    }
}
