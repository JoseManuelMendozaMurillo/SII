<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\CarreraModel;
use Exception;
use CodeIgniter\HTTP\Response;

class Carreras extends CrudController
{
    private $auxCarreras;
    private $carreraModel;

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
    }

    public function getCarrerasAll()
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

    /**
     * changeStatusActive
     * Función AJAX para cambiar el estatus del pago de un aspirante mendiante su id, el estatus del pago
     * cambia a pagado (true) por defecto, pero si se configura el parametro $status en false, el status
     * de pago del aspirante cambia a pago pendiente (false)
     *
     * @param string $idAspirante -> Id del aspirante a actualizar
     * @param bool   $status      -> Nuevo estatus de pago del aspirante (true -> pagado, false -> pago pendiente).
     *                            Por defecto es true
     *
     * @throws Exception -> Se lanza si los parametros no pasan la validación
     *                   -> Se lanza si la petición post no es de tipo AJAX
     *                   -> Se lanza si hay un error al intentar actualizar el estatus de pago
     *
     * @return Response -> Respuesta de la peticion AJAX
     */
    public function changeStatusActive()
    {
        // Nos aseguramos de solo recibir peticiones ajax
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Obtenemos el ID
            $id_carrera = $this->request->getPost('id_carrera');
            $status = 2;

            // Actualizamos el estatus
            if (!$this->carreraModel->changeStatusPayment($id_carrera, $status)) {
                // Si el registro no se actualizo, lanzamos una excepcion
                throw new Exception('El registro no se pudo actualizar', 500);
                $message = 'Aspirant payment status couldnt be changed 
                    {"id": "' . $id_carrera . '", "status": "' . $status . '"}';
                log_message('error', $message);
            }
            $message = 'Aspirant payment status changed {"id": "' . $id_carrera . '", "status": "' . $status . '"}';
            log_message('info', $message);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }
}
