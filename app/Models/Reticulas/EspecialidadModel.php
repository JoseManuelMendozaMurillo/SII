<?php

namespace App\Models\Reticulas;

// Especialidad Model

use App\Models\ServiciosEscolares\CarrerasModel;
use CodeIgniter\Model;

class EspecialidadModel extends Model
{
    // members
    protected $carreraModel;

    // db
    protected $table = 'especialidades';
    protected $primaryKey = 'id_especialidad';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_carrera',                   // Uses ID, CarrerasModel needed
        'nombre_especialidad',
        'clave',
        'clave_oficial',
        'creditos_especialidad',
        'nombre_reducido',
        'siglas',
        'fecha_inicio',
        'fecha_termino',
        'id_nivel_escolar',
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
    protected $returnType = \App\Entities\Reticulas\Especialidad::class;

    protected function initialize()
    {
        $this->carreraModel = new CarrerasModel();
    }
}
