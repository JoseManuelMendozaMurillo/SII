<?php

namespace App\Models\Aspirantes;

use App\Entities\Aspirantes\Aspirante;
use App\Models\Aspirantes\ComplementAspiranteModel;
use CodeIgniter\Model;
use Exception;
use PhpParser\Node\Expr\Cast\String_;

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

    /**
     * getByUserId
     * Función para obetener a un aspirante por medio de su user id (id del shield)
     *
     * @param string $userId -> Id de usuario
     *
     * @return Aspirante -> Entidad con los datos del aspirante con user_id =  $userId
     */
    public function findByUserId(string $userId): Aspirante
    {
        $idAspirante = $this->select('id_aspirante')
                            ->where('user_id', $userId)
                            ->get()->
                            getResultArray()[0]['id_aspirante'];

        return $this->find($idAspirante);
    }

    public function getBankReference(Aspirante $aspirante): string
    {
        // Recibe un objeto aspirante para evitar hacer mas consultas de las necesarias a la bd

        $date = $aspirante->fecha_nacimiento;
        $date_aux = substr($date, 2, 2) . substr($date, 5, 2) . substr($date, 8, 2);
        $referencia = 'ITOCO'
        . $aspirante->no_solicitud
        . $aspirante->apellido_paterno
        . str_replace(' ', '', $aspirante->nombre)
        . $date_aux;
        $referencia = strtoupper($referencia);

        return $referencia;
    }

    public function getPaymentStatus(Aspirante $aspirante): bool
    {
        return $aspirante->estatus_pago == '1' ? true : false;
    }

    public function getFullName(Aspirante $aspirante): string
    {
        // $aspirante = $aspirante->toArray();
        $fullName = $aspirante->nombre . ' '
                        . $aspirante->apellido_paterno . ' '
                        . $aspirante->apellido_materno;

        return $fullName;
    }

    public function getApplicationNumber(Aspirante $aspirante)
    {
        // return $aspirante['no_solicitud'];
        return $aspirante->no_solicitud;
    }

    public function getPhotoPath(Aspirante $aspirante): string
    {
        $pathPhotos = config('Paths')->accessPhotosAspirantes
        . '/'
        . $aspirante->user_id
        . '/'
        . $aspirante->imagen;

        // dd($pathPhotos);

        return $pathPhotos;
    }

    public function getCurp(Aspirante $aspirante): string
    {
        return $aspirante->curp;
    }

    public function getFirstOption(Aspirante $aspirante): string
    {
        return $aspirante->carrera_primera_opcion;
    }

    public function getNip(Aspirante $aspirante): string
    {
        return $aspirante->nip;
    }

    public function getDataForRecibo($id)
    {
        $aspirante = $this->findByUserId($id);

        $data = [
            'reference' => $this->getBankReference($aspirante),
            'no_solicitud' => $this->getApplicationNumber($aspirante),
        ];

        return $data;
    }

    public function getDataForIndex($id)
    {
        $aspirante = $this->findByUserId($id);

        $data = [
            'fullname' => $this->getFullName($aspirante),
            'no_solicitud' => $this->getApplicationNumber($aspirante),
            'path_photo' => $this->getPhotoPath($aspirante),
            'payment_status' => $this->getPaymentStatus($aspirante),
            'reference' => $this->getBankReference($aspirante),
        ];

        return $data;
    }

    public function getDataForFicha($id)
    {
        $aspirante = $this->findByUserId($id);

        $data = [
            'fullname' => $this->getFullName($aspirante),
            'curp' => $this->getCurp($aspirante),
            'no_solicitud' => $this->getApplicationNumber($aspirante),
            'nip' => $this->getNip($aspirante),
            'first_option' => $this->getFirstOption($aspirante),
            'path_photo' => $this->getPhotoPath($aspirante),
            // 'payment_status' => $this->getPaymentStatus($aspirante),
            // 'reference' => $this->getBankReference($aspirante),

        ];

        return $data;
    }

    public function deleteAspirante($userId)
    {
        // Iniciamos una transacción
        $this->db->transStart();

        try {
            $users = auth()->getProvider();

            //Borrar el aspirante de la BD
            $aspirante = $this->aspirantesModel->where('user_id', $userId)->first();
            $this->aspirantesModel->delete($aspirante->id_aspirante);

            if (!$users->delete($userId)) {
                throw new Exception('Hubo un error al intentar eliminar al aspirante de las tablas de usuarios');
            }

            // Si todo salio bien, confirmamos la transacción
            $this->db->transCommit();

            // Retornamos vista de exito
            d('Aspirante eliminado');
        } catch (Exception $e) {
            // Hacemos un rollback para no romper la integridad de los datos
            $this->db->transRollback();

            // Mostrar la vista de error en el back
            dd('Error: ' . $e->getMessage());
        }
    }
}
