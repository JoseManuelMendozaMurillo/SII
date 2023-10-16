<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaModel;
use Exception;

// Asignaturas controller

class Asignaturas extends CrudController
{
    private $auxAsignaturas;
    private $asignaturaModel;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\AsignaturaModel',
            'App\Entities\Reticulas\Asignatura',
            'asignatura',
            'App\OperationValidators\Reticulas\AsignaturaValidator',
        );

        $this->auxAsignaturas = new AuxAsignaturas();
        $this->asignaturaModel = new AsignaturaModel();
    }

    public function getAsignaturas()
    {
        try {
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

    //Function to get all asignaturas paginated
    public function getAll()
    {
        $current = $this->request->getPost('current');
        $rowCount = $this->request->getPost('rowCount');

        // Get all asignaturas paginated
        $data = $this->asignaturaModel->paginate($rowCount, 'default', $current);

        // Get total of asignaturas
        $total = $this->asignaturaModel->countAll();

        return $this->response->setStatusCode(200)->setJSON([
            'current' => $current,
            'rowCount' => $rowCount,
            'rows' => $data,
            'total' => $total,
        ]);
    }

    public function getByClave($clave)
    {
        dd($this->auxAsignaturas->getByClave($clave));
    }
}
