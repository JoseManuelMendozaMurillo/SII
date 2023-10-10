<?php

namespace App\Models\Reticulas;

// Carrera model

use CodeIgniter\Model;

class CarreraModel extends Model
{
    // members
    protected $nivelEscolarModel;

    // db
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nombre_carrera',
        'clave_oficial',
        'clave',
        'siglas',
        'creditos_totales',
        'id_nivel_escolar',
        'fecha_inicio',
        'fecha_termino',
        'id_area_carr',
        'id_nivel_carr',
        'id_sub_area_carr',
        'nivel',
        'estatus',
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

    // entity
    protected $returnType = \App\Entities\Reticulas\Carrera::class;

    protected function initialize()
    {
        $this->nivelEscolarModel = new NivelEscolarModel();
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
