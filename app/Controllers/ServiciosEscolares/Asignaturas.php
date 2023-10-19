<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;
use App\Models\Reticulas\AsignaturaModel;

class Asignaturas extends BaseController
{
    public function listMaterias()
    {
        $datos = [
            'nombreModulo' => 'Materias',
        ];

        $this->twig->display('ServiciosEscolares/gestionar_materias', $datos);
    }

    public function listEspecialidades()
    {
        $datos = [
            'nombreModulo' => 'Especialidades',
        ];

        $this->twig->display('ServiciosEscolares/gestionar_especialidades', $datos);
    }
}
