<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class AsignaturaCarreraModel extends Model
{
    // members
    protected $carreraModel;
    protected $asignaturaModel;

    // db
    protected $table = 'asignaturas_carrera';
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
        $this->carreraModel = new CarreraModel();
        $this->asignaturaModel = new AsignaturaModel();
    }

    public function getByCarrera($id_carrera)
    {
        $data = $this->where('id_carrera', $id_carrera)->findAll();

        return $data;
    }

    // public function getAsArray()
    // {
    //     $data = $this->find();

    //     $array = [];
    //     foreach ($data as $obj) {
    //         array_push($array, $obj->toArray());
    //     }

    //     return $array;
    // }
}
