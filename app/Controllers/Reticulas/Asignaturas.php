<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaCarreraModel;
use CodeIgniter\HTTP\Response;
use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\AsignaturaEspecialidadModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
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

    // Function to get all asignaturas paginated
    public function getAll()
    {
        $current = $this->request->getPost('current');
        $rowCount = $this->request->getPost('rowCount');
        $searchPhrase = $this->request->getPost('searchPhrase');
        $selectedEstado = $this->request->getPost('selectedEstado');

        // Iniciar una consulta base sin restricciones
        $query = $this->asignaturaModel->table('asiganaturas');

        // Aplicar búsqueda si se proporciona una frase de búsqueda
        if (!empty($searchPhrase)) {
            $query->like('nombre_asignatura', $searchPhrase);
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
     * getAsignaturasBasicas
     * Función para obtener las asignaturas basicas (que se aplican a mas de una carrera)
     *
     * @return Response
     */
    public function getAsignaturasBasicas(): Response
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            $basicas = $this->auxAsignaturas->getAsignaturasBasicas();

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $basicas, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * getAsignaturasByCarrera
     * Función para obtener las asignaturas de una carrera
     *
     * @return Response
     */
    public function getAsignaturasByCarrera(): Response
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos que el id sea valido
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestGetByCarrera')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos el Id de la carrera y la bandera para obtener las materias de la carrera
            $idCarrera = $this->request->getPost('id');
            $onlyGenericas = filter_var($this->request->getPost('onlyGenericas'), FILTER_VALIDATE_BOOLEAN);

            // Obtenemos las asignaturas de la carrera
            $asignaturasByCarrera = $this->auxAsignaturas->getAsignaturasByCarrera($idCarrera, $onlyGenericas);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $asignaturasByCarrera, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    /**
     * getAsignaturasByEspecialidad
     * Función para obtener las asignaturas de una especialidad
     *
     * @return Response
     */
    public function getAsignaturasByEspecialidad(): Response
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos que el id sea valido
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestGetByEspecialidad')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos el Id de la especialidad
            $idEspecialidad = $this->request->getPost('id');

            // Obtenemos las asignaturas de la especialidad
            $asignaturasByEspecialidad = $this->auxAsignaturas->getAsignaturasByEspecialidad($idEspecialidad);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $asignaturasByEspecialidad, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getByClave()
    {
        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }

            // Validamos que la clave sea valida
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'requestGetByClave')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos la clave de la especialidad
            $clave = $this->request->getPost('clave');

            // Obtenemos la asignatura segun la clave
            $asignatura = $this->auxAsignaturas->getByClave($clave);

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'data' => $asignatura, ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function test($value)
    {
        // TODO: Comprobar funcionamiento
        $modelAsignaturas = new AsignaturaModel();
        $asignatura = $modelAsignaturas->find($value);

        $type = $asignatura->id_tipo_asignatura;

        if ($type != 1) {
            throw new Exception('La asignatura no es de tipo "Básica"');
        }

        $asignaturasCarreraModel = new AsignaturaCarreraModel();
        $asignaturasCarrera = $asignaturasCarreraModel->where('id_asignatura', $asignatura->id_asignatura)->find();
        $num = sizeof($asignaturasCarrera);

        d($asignaturasCarrera);

        if ($num == 0) {
            dd(true);
        }

        $modelCarrera = new CarreraModel();
        foreach ($asignaturasCarrera as $data) {
            d($data);
            $carrera = $modelCarrera->find($data['id_carrera']);
            if ($carrera->estatus == 2) {
                dd(false);
            }
        }

        dd(true);
    }

    // Get Carreras
    public function getCarreras()
    {
        $carreraModel = new CarreraModel();

        try {
            $datos = $carreraModel->getAsArrayValidate();

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'carreras' => $datos]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    // Assign asignatura to carrera
    public function assignAsignaturaToCarrera()
    {
        try {
            // Retrieve data from the request (assuming you are using CodeIgniter 4)
            $idCarrera = $this->request->getPost('id_carrera');
            $idAsignatura = $this->request->getPost('id_asignatura');
    
            // Validate data if necessary
    
            // Create a new instance of your model
            $asignaturaCarreraModel = new AsignaturaCarreraModel();
    
            // Prepare data for insertion
            $data = [
                'id_carrera' => $idCarrera,
                'id_asignatura' => $idAsignatura,
            ];
    
            // Insert data into the database
            $asignaturaCarreraModel->insert($data);
    
            return $this->response->setStatusCode(201)->setJSON(['success' => true, 'message' => 'Data inserted successfully']);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    // Get Especialidades
    public function getEspecialidades()
    {


        $especialidadModel = new EspecialidadModel();

        try {
            $datos = $especialidadModel->getAsArrayValidate();

            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'especialidades' => $datos]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }

    }

    // Assign asignatura to especialidad
    public function assignAsignaturaToEspecialidad()
    {
        try {
            // Retrieve data from the request (assuming you are using CodeIgniter 4)
            $idEspecialidad = $this->request->getPost('id_especialidad');
            $idAsignatura = $this->request->getPost('id_asignatura');
    
            // Validate data if necessary
    
            // Create a new instance of your model
            $asignaturaCarreraModel = new AsignaturaEspecialidadModel();
    
            // Prepare data for insertion
            $data = [
                'id_especialidad' => $idEspecialidad,
                'id_asignatura' => $idAsignatura,
            ];
    
            // Insert data into the database
            $asignaturaCarreraModel->insert($data);
    
            return $this->response->setStatusCode(201)->setJSON(['success' => true, 'message' => 'Data inserted successfully']);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }


}
