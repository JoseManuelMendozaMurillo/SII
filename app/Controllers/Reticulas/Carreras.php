<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\ReticulaModel;
use Exception;
use CodeIgniter\HTTP\Response;

class Carreras extends CrudController
{
    private $auxCarreras;
    private $carreraModel;
    private $reticulaModel;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\CarreraModel',
            'App\Entities\Reticulas\Carrera',
            'carrera',
            'App\OperationValidators\Reticulas\CarreraValidator',
        );
        $this->auxCarreras = new AuxCarreras();
        $this->carreraModel = new CarreraModel();
        $this->reticulaModel = new ReticulaModel();
    }

    public function getCarrerasAll()
    {
        $data['carreras'] = $this->auxCarreras->getCarreras();

        $this->twig->display('ServiciosEscolares/reticulas_carreras', $data);
    }

    public function changeStatusToInactive()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            $id_carrera = $this->request->getPost('id_carrer');

            $carrera = $this->model->find($id_carrera);
            // d($carrera->estatus);

            $reticulas = $this->reticulaModel->where('id_carrera', $id_carrera)->find();

            foreach ($reticulas as $reticula) {
                d($reticula->estatus);
                if ($reticula->estatus != 1) {
                    return $this->response->setStatusCode(304)->setJSON([
                        'success' => true,
                        'data' => 'Estatus de carrera no modificado', ]);
                }
            }

            $carrera->estatus = 1;
            $this->model->save($carrera);
            $carrera = $this->model->find($id_carrera);
            $message = 'Cambio de estado en una carrera {"id_carrera": "' . $carrera->id . '", "estado": "1"}';
            log_message('info', $message);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => 'Estatus de carrera modificado', ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }
}
