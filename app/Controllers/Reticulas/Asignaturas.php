<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaCarreraModel;
use Exception;

// Asignaturas controller

class Asignaturas extends CrudController
{
    private $asigntauraCarreraModel;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\AsignaturaModel',
            'App\Entities\Reticulas\Asignatura',
            'asignatura'
        );

        $this->asigntauraCarreraModel = new AsignaturaCarreraModel();
    }

    public function getByCarrera()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            // $data = $this->request->getPost();

            $id = $this->request->getPost('id');

            $data = $this->asigntauraCarreraModel->getByCarrera($id);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
        $this->asigntauraCarreraModel->getByCarrera();
    }
}
