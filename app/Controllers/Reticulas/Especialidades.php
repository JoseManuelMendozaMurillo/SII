<?php

namespace App\Controllers\Reticulas;

use App\Controllers\Reticulas\CrudController;
use App\Models\Reticulas\EspecialidadModel;
use CodeIgniter\HTTP\Response;

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
}
