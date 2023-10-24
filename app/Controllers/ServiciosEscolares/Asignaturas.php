<?php

namespace App\Controllers\ServiciosEscolares;

use App\Controllers\BaseController;
use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;

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
        $carrera = new CarreraModel();

        $datos = [
            'nombreModulo' => 'Especialidades',
            'carreras' => $carrera->getAsArray(),
        ];

        $this->twig->display('ServiciosEscolares/gestionar_especialidades', $datos);
    }
}
