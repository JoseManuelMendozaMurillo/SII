<?php

namespace App\Controllers\Reticulas;

use App\Entities\Reticulas\Especialidad;
use App\Models\Reticulas\AsignaturaCarreraModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use Exception;

// Asignaturas controller

class Asignaturas extends CrudController
{
    private $auxAsignaturas;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\AsignaturaModel',
            'App\Entities\Reticulas\Asignatura',
            'asignatura'
        );

        $this->auxAsignaturas = new AuxAsignaturas();
    }

    public function getAsignaturas()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            $basicas = $this->auxAsignaturas->getAsignaturasBasicas();
            $genericas = $this->auxAsignaturas->getAsignaturasByCarrera();
            $especificas = $this->auxAsignaturas->getAsignaturasByEspecialidad();

            $allData = [];

            array_push($allData, $basicas);
            array_push($allData, $genericas);
            array_push($allData, $especificas);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $allData, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getByClave($clave)
    {
        dd($this->auxAsignaturas->getByClave($clave));
    }
}
