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

    // public function getData()
    // {
    //     // Cargar la biblioteca de entrada
    //     $this->load->library('input');

    //     // Obtener los datos enviados en la solicitud POST
    //     $id_carrera = $this->input->post('id_carrera');

    //     // Hacer algo con los datos (por ejemplo, imprimirlos)
    //     echo 'ID de Carrera: ' . $id_carrera;

    //     // Enviar una respuesta JSON al cliente
    //     $response = ['message' => 'Datos recibidos exitosamente', 'id_carrera' => $id_carrera];
    //     $this->output->set_content_type('application/json');
    //     $this->output->set_output(json_encode($response));
    // }
}
