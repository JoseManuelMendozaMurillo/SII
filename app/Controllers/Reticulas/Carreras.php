<?php

namespace App\Controllers\Reticulas;

use Exception;

class Carreras extends CrudController
{
    private $auxCarreras;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\CarreraModel',
            'App\Entities\Reticulas\Carrera',
            'carrera',
            'App\OperationValidators\Reticulas\CarreraValidator',
        );
        $this->auxCarreras = new AuxCarreras();
    }

    public function getCarrerasAll()
    {
        // try {
        //     if (!$this->request->isAJAX()) {
        //         throw new Exception('No se encontró el recurso', 404);
        //     }

        $borrador = $this->auxCarreras->getCarrerasBorrador();
        $activas = $this->auxCarreras->getCarrerasActivas();
        $inactivas = $this->auxCarreras->getCarrerasInactivas();

        $data['carreras'] = $this->auxCarreras->getCarreras();
        // dd($data);

        $this->twig->display('ServiciosEscolares/reticulas_carreras', $data);
        //$carreras = [];

        // array_push($carreras, $borrador);
        // array_push($carreras, $activas);
        // array_push($carreras, $inactivas);

        //     return $this->response->setStatusCode(200)->setJSON([
        //         'success' => true,
        //         'data' => $carreras, ]);
        // } catch (Exception $e) {
        //     return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        // }
    }
}
