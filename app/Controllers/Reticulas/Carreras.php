<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use App\Models\Reticulas\ReticulaModel;
use Exception;
use CodeIgniter\HTTP\Response;

class Carreras extends CrudController
{
    private $auxCarreras;
    private $carreraModel;
    private $reticulaModel;
    private $especialidadModel;
    private $asignaturaEspecialidadModel;

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
        $this->especialidadModel = new EspecialidadModel();
        $this->asignaturaEspecialidadModel = new AsignaturaEspecialidadModel();
    }

    public function getCarrerasAll()
    {
        $data['carreras'] = $this->auxCarreras->getCarreras();

        $this->twig->display('ServiciosEscolares/reticulas_carreras', $data);
    }

    public function updateCarrerasAll()
    {
        $current = $this->request->getPost('current');
        $rowCount = $this->request->getPost('rowCount');
        $searchPhrase = $this->request->getPost('searchPhrase');
        $selectedEstado = $this->request->getPost('selectedEstado');

        // Iniciar una consulta base sin restricciones
        $query = $this->carreraModel->table('carreras'); // Reemplaza 'carreras' con el nombre de tu tabla

        // Aplicar búsqueda si se proporciona una frase de búsqueda
        if (!empty($searchPhrase)) {
            $query->like('nombre_carrera', $searchPhrase);
        }

        // Aplicar filtro de estado si se selecciona un valor en el select
        if (!empty($selectedEstado) && in_array($selectedEstado, ['1', '2', '3'])) {
            $query->where('estatus', $selectedEstado); // Reemplaza 'estado' con el nombre del campo en tu tabla
        }

        // Calcular el total de registros sin límites
        $total = $query->countAllResults(false);

        // Aplicar paginación
        $query->limit($rowCount, ($current - 1) * $rowCount);

        // Obtener los datos
        $data = $query->get()->getResult();

        return $this->response->setStatusCode(200)->setJSON([
            'current' => $current,
            'rowCount' => $rowCount,
            'rows' => $data,
            'total' => $total,
        ]);
    }

    public function changeStatusToInactive()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            $id_carrera = $this->request->getPost('id_carrera');

            $carrera = $this->model->find($id_carrera);
            // d($carrera->estatus);

            $reticulas = $this->reticulaModel->where('id_carrera', $id_carrera)->find();

            foreach ($reticulas as $reticula) {
                if ($reticula->estatus == 2) {
                    return $this->response->setStatusCode(304)->setJSON([
                        'success' => true,
                        'data' => 'Estatus de carrera no modificado', ]);
                }
            }

            $carrera->estatus = 3;
            $this->model->save($carrera);
            $carrera = $this->model->find($id_carrera);
            $message = 'Cambio de estado en una carrera {"id_carrera": "' . $carrera->id . '", "estatus": "1"}';
            log_message('info', $message);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => 'Estatus de carrera modificado', ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function deleteEspecialidad()
    {
        $id_carrera = $this->request->getPost('id_carrera');
        //$carrera = $this->model->find($id_carrera);
        $especialidad = $this->especialidadModel->where('id_carrera', $id_carrera)->find();
        $id_especialidad = $especialidad['id_especialidad'];
        $asignaturasEspecialidad = $this->asignaturaEspecialidadModel->
            where('id_especialidad', $id_especialidad)->find();
        foreach ($asignaturasEspecialidad as $asignaturaEspecialidad) {
        }
    }

    public function deleteCarrera()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            $id = $this->request->getPost('id_carrera');

            $this->model->delete($id, true);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }
}
