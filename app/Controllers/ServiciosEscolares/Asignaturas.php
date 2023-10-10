<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;
use App\Models\Reticulas\AsignaturaModel;

class Asignaturas extends BaseController
{
    public function listMaterias()
    {
        // Obtenemos los datos necesarios
        $asignaturaModel = new AsignaturaModel();

        $data = $asignaturaModel->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        $datos = [
            'nombreModulo' => 'Materias',
            'materias' => $array,
        ];

        $this->twig->display('ServiciosEscolares/gestionar_materias', $datos);
    }

    // Function that recieve data from template twig
    public function createMateria()
    {
        // Obtenemos los datos del form
        $data = $this->request->getPost('formValues');

        $asignaturaModel = new AsignaturaModel();

        $result = $this->$asignaturaModel->createMateria($data);

        if ($result) {
            // Assignment created successfully
            echo 'Assignment created successfully!';
        } else {
            // Failed to create assignment
            echo 'Failed to create assignment. Please try again.';
        }
    }
}
