<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class AsignaturaCarreraModel extends Model
{
    // members

    // db
    protected $table = 'asignaturas_carrera';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_carrera',
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

    public function getByCarrera($id_carrera)
    {
        $data = $this->where('id_carrera', $id_carrera)->findAll();

        return $data;
    }

    /**
       * Función para buscar una asignatura
       *
       * @return array
       */
    public function getByAsignatura($id_asignatura, $id_carrera = -1)
    {
        if ($id_carrera != -1) {
            $data = $this->where(['id_asignatura' => $id_asignatura, 'id_carrera' => $id_carrera])->findAll();

            return $data;
        }

        $data = $this->where('id_asignatura', $id_asignatura)->findAll();

        return $data;
    }

    public function getByIdCarrera($id_carrera)
    {
        $select = ['id_asignatura'];
        $where = ['id_carrera' => $id_carrera];
        $data = $this->select($select)->where($where)->get()->getResult();

        return $data;
    }
}
