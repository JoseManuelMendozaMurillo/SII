<?php

namespace App\Models\Aspirantes;

use App\Entities\Aspirantes\Aspirante;
use App\Models\Aspirantes\ComplementAspiranteModel;
use CodeIgniter\Model;

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
        'status_pago',
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
     * save
     * Función para guardar todos los datos de un aspirante en ambas tamblas
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
}
