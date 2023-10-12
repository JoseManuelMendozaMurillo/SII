<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class AsignaturaEspecialidadModel extends Model
{
    // members
    protected $especialidadModel;
    protected $asignaturaModel;

    // db
    protected $table = 'asignaturas_especialidad';
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
        $this->especialidadModel = new EspecialidadModel();
        $this->asignaturaModel = new AsignaturaModel();
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
}
