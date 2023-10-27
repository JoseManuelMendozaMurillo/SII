<?php

namespace App\Controllers\Reticulas;

use App\Controllers\Reticulas\CrudController;
use App\Models\Reticulas\EspecialidadModel;

class Especialidades extends CrudController
{
    private $especialidadesModel;

    public function __construct()
    {
        parent::__construct(
            'App\Models\Reticulas\EspecialidadModel',
            'App\Entities\Reticulas\Especialidad',
            'especialidad',
            'App\OperationValidators\Reticulas\EspecialidadValidator',
        );

        $this->especialidadesModel = new EspecialidadModel();
    }

    // Function to get all especialidades paginated
    public function getAllEspecialidades()
    {
        $current = $this->request->getPost('current');
        $rowCount = $this->request->getPost('rowCount');
        $searchPhrase = $this->request->getPost('searchPhrase');
        $selectedEstado = $this->request->getPost('selectedEstado');

        // Iniciar una consulta base sin restricciones
        $query = $this->especialidadesModel->table('especialidades');

        // Aplicar búsqueda si se proporciona una frase de búsqueda
        if (!empty($searchPhrase)) {
            $query->like('nombre_especialidad', $searchPhrase);
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

    // Eliminate only especialidad without reticula
    public function deleteEspecialidadWithoutReticula()
    {
        $id_especialidad = $this->request->getPost('id_especialidad');
        $id_carrera = $this->request->getPost('id_carrera');

        try {
            // Get especialidades without Reticulas
            $especialidadesWithoutReticula = $this->especialidadesModel->getWithoutReticula($id_carrera);

            // Validate if especialidad is in especialidadesWithoutReticula
            $especialidad = $this->especialidadesModel->find($id_especialidad);

            if (in_array($especialidad, $especialidadesWithoutReticula)) {
                return $this->response->setStatusCode(500)->setJSON([
                    'message' => 'La especialidad no se puede eliminar porque tiene reticulas asignadas',
                ]);
            }

            // Delete especialidad
            $this->especialidadesModel->deleteWithAsignaturas($id_especialidad);

            return $this->response->setStatusCode(200)->setJSON([
                'message' => 'Se eliminó la especialidad correctamente',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'message' => 'Ocurrió un error al eliminar la especialidad' + $e->getMessage(),
            ]);
        }
    }
}
