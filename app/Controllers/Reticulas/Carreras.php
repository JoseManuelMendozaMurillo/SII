<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaCarreraModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\AsignaturaModel;
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
    private $asignaturaModel;
    private $asignaturaEspecialidadModel;
    private $asignaturaCarreraModel;

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
        $this->asignaturaModel = new AsignaturaModel();
        $this->asignaturaEspecialidadModel = new AsignaturaEspecialidadModel();
        $this->asignaturaCarreraModel = new AsignaturaCarreraModel();
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

    public function deleteCarrera()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            $id_carrera = $this->request->getPost('id');

            // 1. Obtén las especialidades relacionadas con la carrera.
            $especialidades = $this->especialidadModel->where('id_carrera', $id_carrera)->findAll();

            // 2. Elimina las asignaturas de las especialidades de la relacion.
            foreach ($especialidades as $especialidad) {
                $id_especialidad = $especialidad->id_especialidad;
                $this->asignaturaEspecialidadModel->where('id_especialidad', $id_especialidad)->delete(null, false);
            }

            // 3. Elimina las especialidades.
            $this->especialidadModel->where('id_carrera', $id_carrera)->delete(null, false);

            // 4. Elimina las asignaturas de carrera (genéricas) de la relacion.
            $this->asignaturaCarreraModel->where('id_carrera', $id_carrera)->delete(null, false);

            $asignaturasCarrera = $this->asignaturaModel->whereIn('id_asignatura', function ($builder) use ($id_carrera) {
                $builder->select('id_asignatura')
                    ->from('asignaturas_carrera')
                    ->whereIn('id_carrera', function ($builder) use ($id_carrera) {
                        $builder->select('id_carrera')
                            ->from('carreras')
                            ->where('id_carrera', $id_carrera);
                    });
            })->findAll();

            foreach ($asignaturasCarrera as $asignatura) {
                $id_asignatura = $asignatura->id_asignatura;
                $this->asignaturaModel->delete($id_asignatura);
            }

            // 5. Elimina las asignaturas relacionadas con la carrera a través de las especialidades
            $asignaturas = $this->asignaturaModel->whereIn('id_asignatura', function ($builder) use ($id_carrera) {
                $builder->select('id_asignatura')
                    ->from('asignaturas_especialidad')
                    ->whereIn('id_especialidad', function ($builder) use ($id_carrera) {
                        $builder->select('id_especialidad')
                            ->from('especialidades')
                            ->where('id_carrera', $id_carrera);
                    });
            })->findAll();

            foreach ($asignaturas as $asignatura) {
                $id_asignatura = $asignatura->id_asignatura;
                $this->asignaturaModel->delete($id_asignatura);
            }

            // 6. Elimina las retículas asociadas a la carrera.
            $this->reticulaModel->where('id_carrera', $id_carrera)->delete(null, false);

            // 7. Elimina la carrera.
            $this->carreraModel->delete($id_carrera);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }
}
