<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class AsignaturaEspecialidadModel extends Model
{
    // members

    // db
    protected $table = 'asignaturas_especialidad';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_especialidad',
        'id_asignatura',
        'semestre_recomendado',
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
    }

    public function getAsArray()
    {
        $data = $this->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        return $array;
    }

    /**
     * Función para buscar una asignatura
     *
     * @return array
     */
    public function getByAsignatura($id_asignatura, $id_especialidad = -1)
    {
        if ($id_especialidad != -1) {
            $data = $this->where(['id_asignatura' => $id_asignatura, 'id_especialidad' => $id_especialidad])->findAll();

            return $data;
        }

        $data = $this->where('id_asignatura', $id_asignatura)->findAll();

        return $data;
    }

    /**
     * Función para obtener los id de las asignaturas que pertenecen a una especialidad
     *
     * @param string|int id_especialidad Id de la especialidad a consultar
     *
     * @return array<stdClass>
     */
    public function getByIdEspecialidad($id_especialidad)
    {
        $select = ['id_asignatura', 'semestre_recomendado'];
        $where = ['id_especialidad' => $id_especialidad];
        $data = $this->select($select)->where($where)->get()->getResult();

        return $data;
    }
}
