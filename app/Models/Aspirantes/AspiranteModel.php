<?php

namespace App\Models\Aspirantes;

use App\Entities\Aspirantes\Aspirante;
use App\Models\Aspirantes\ComplementAspiranteModel;
use CodeIgniter\Model;
use Exception;

class AspiranteModel extends Model
{
    protected $complementAspiranteModel;

    // Configuracion del modelo
    protected $table = 'aspirantes';
    protected $primaryKey = 'id_aspirante';
    protected $useAutoIncrement = true;
    protected $returnType = Aspirante::class;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'user_id',
        'no_solicitud',
        'nip',
        'estatus_pago',
        'imagen',
        'curp',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'fecha_nacimiento',
        'genero',
        'estado_civil',
        'pais_nacimiento',
        'telefono',
        'email',
        'escuela_procedencia',
        'estado_escuela',
        'municipio_escuela',
        'ano_egreso',
        'promedio_general',
        'carrera_primera_opcion',
        'carrera_segunda_opcion',
        'turno_preferente',
        'ito_primer_opcion',
        'motivo_ingreso',
        'motivo_seleccion_plan_estudios',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    protected function initialize()
    {
        $this->complementAspiranteModel = new ComplementAspiranteModel();
    }

    /**
     * save
     * Función para guardar todos los datos de un aspirante en ambas tablas
     *
     */
    public function save($data = null, bool $validate = true): bool
    {
        if (!parent::save($data, $validate)) {
            return false;
        }

        $data->id_aspirante = $this->db->insertID();

        return $this->complementAspiranteModel->save($data, $validate);
    }

    /**
     * delete
     * Función para eliminar los datos de un aspirante de las 2 tablas
     *
     * @param ?string $id    -> Id del aspirante a eliminar
     * @param bool    $purge -> Opción para eliminar fisicamente a un aspirante (por defecto es false)
     */
    public function delete($id = null, bool $purge = false)
    {
        if ($id !== null) {
            // Eliminar datos complementarios del modelo secundario
            if (!$this->complementAspiranteModel->deleteAspirante($id, $purge)) {
                return false;
            }
        }

        // Eliminar registro principal
        return parent::delete($id, $purge);
    }

    /**
     * find
     * Función para buscar por id un registro de un aspirante, la funcion devuelve todos los datos de las 2 tablas
     * de aspirantes en un solo conjunto de datos (Si el id es null se obtienen todos los registros)
     *
     */
    public function find($id = null)
    {
        $aspirantes = parent::find($id);

        if ($aspirantes !== null) {
            foreach ($aspirantes as $aspirante) {
                $complementData = $this->complementAspiranteModel->where('id_aspirante', $aspirante->id_aspirante)
                                                                 ->first();
                if ($complementData !== null) {
                    foreach ($complementData as $key => $value) {
                        $aspirante->$key = $value;
                    }
                }
            }
        }

        return $aspirantes;
    }

    /**
     * first
     * Función para obtener el primer resultado de una consulta a la tabla aspirante, la funcion devuelve
     * todos los datos de las 2 tablas de aspirantes en un solo conjunto de datos
     *
     */
    public function first()
    {
        $aspirante = parent::first();

        if ($aspirante !== null) {
            $complementData = $this->complementAspiranteModel->where('id_aspirante', $aspirante->id_aspirante)->first();

            if ($complementData !== null) {
                foreach ($complementData as $key => $value) {
                    $aspirante->$key = $value;
                }
            }
        }

        return $aspirante;
    }

    /**
     * getLastNoSolicutude
     * Funcion para obtener el ultimo número de solicutud registrado
     *
     * @return string
     */
    public function getLastNoSolicutude(): string
    {
        // Construimos y ejecutamos la consulta
        $query = $this->select('no_solicitud')
                  ->where($this->deletedField, null)
                  ->orderBy('user_id', 'desc')
                  ->limit(1);

        $result = $query->get();

        // Si existe un número de solicutud lo retornamos, si no existe retornamos cero
        if ($result !== false && $result->getNumRows() > 0) {
            return $result->getRow()->no_solicitud;
        } else {
            return '0';
        }
    }

    /**
     * getListNips
     * Funcion para obtener una lista con todos los nips
     *
     * @return array
     */
    public function getListNips(): array
    {
        return $this->select('nip')->get()->getResultArray();
    }

    /**
     * getByStatusPayment
     * Funcion para obtener el los datos de los aspirantes que YA realizarón su pago ($statusPayment = true)
     * o los datos de los aspirantes que NO han realizado su pago ($statusPayment = false)
     *
     * @param bool $statusPayment -> Parametro que controla si se obtienen los aspirantes que ya realizarón
     *                            su pago (true) o los aspirantes que aun no realizan su pago (false)
     *
     * @return array $result -> Datos de los aspirantes
     */
    public function getByStatusPayment(bool $statusPayment): array
    {
        // Creamos la consulta para obtener los datos necesarios de la base de datos
        $getData = $this->select('id_aspirante, user_id, curp, no_solicitud, imagen, apellido_paterno, 
                                apellido_materno, nombre, email')
                      ->where('estatus_pago', $statusPayment);

        // Ejecutamos la consulta
        $data = $getData->get()->getResultArray();

        // Transformamos algunos datos para crear el resultado
        $pathPhotos = config('Paths')->accessPhotosAspirantes . '/';
        $result = [];
        foreach ($data as $aspirante) {
            $name = implode(' ', [$aspirante['nombre'],
                $aspirante['apellido_paterno'],
                $aspirante['apellido_materno']]);
            $result[] = [
                'id' => $aspirante['id_aspirante'],
                'noSolicitude' => $aspirante['no_solicitud'],
                'name' => $name,
                'pathPhotos' => $pathPhotos . $aspirante['user_id'],
                'photo' => $aspirante['imagen'],
                'curp' => $aspirante['curp'],
                'email' => $aspirante['email'],
            ];
        }
        $result['totalAspirantes'] = count($data);

        return $result; // Retorna el resultado
    }

    /**
     * countByStatusPayment
     * Funcion para obtener el número de aspirantes que YA realizarón su pago ($statusPayment = true)
     * o el número de aspirantes que NO han realizado su pago ($statusPayment = false)
     *
     * @param bool $statusPayment -> Parametro que controla si se cuentan los aspirantes que ya realizarón
     *                            su pago (true) o los aspirantes que aun no realizan su pago (false)
     *
     * @return int $numAspirantes -> Número de aspirantes
     */
    public function countByStatusPayment(bool $statusPayment): int
    {
        $query = $this->selectCount('id_aspirante')->where('estatus_pago', $statusPayment);

        $result = $query->get()->getResult();

        if (!empty($result) && isset($result[0]->id_aspirante)) {
            return intval($result[0]->id_aspirante);
        }

        return 0; // Si no hay resultados, retornar 0
    }

    /**
     * changeStatusPayment
     * Funcion para actualizar el estatus del pago de un aspirante mediante su id
     *
     * @param string $idAspirante -> Id del aspirante al cual se le quiere actualizar el estatus del pago
     * @param bool   $status      -> Estado del pago del aspirante (true -> pagado, false -> pago pendiente).
     *                            Por defecto true
     *
     * @throws Exception -> Se lanza si hay un error al momento de intentar actualizar un registro
     *
     * @return bool $status -> Retorna true si el cambio de estatus fue exitoso, de lo contrario false
     */
    public function changeStatusPayment(string $idAspirante, bool $status = true): bool
    {
        try {
            // Actualizamos el estado del pago
            return $this->update($idAspirante, [
                'estatus_pago' => $status,
            ]);
        } catch (Exception $e) {
            throw new Exception('Hubo un error en la base de datos al intentar actualizar el registro', 500);
        }
    }

    /**
     * getDataForAcademicDevReport
     * Función para obtener los datos de los aspirantes que necesita el departamento de desarrollo académico
     * para crear el reporte que envía a México sobre los aspirantes que deben hacer su examen de admisión
     *
     * @return array -> Array con la información requerida para elaborar el reporte
     */
    public function getDataForAcademicDevReport(): array
    {
        // Creamos la consulta para obtener los datos necesarios
        $getData = $this->select('curp, apellido_paterno, apellido_materno, nombre, email')
                        ->where('estatus_pago', true);

        // Ejecutamos la consulta y retornamos el resultado
        return $getData->get()->getResultArray();
    }
}
