<?php

namespace App\Models\Reticulas;

use App\Models\ServiciosEscolares\CarrerasModel;
use CodeIgniter\Model;

class ReticulaModel extends Model
{
    // members
    protected $carreraModel;
    protected $especialidadModel;

    //db
    protected $table = 'reticulas';
    protected $primaryKey = 'id_reticula';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nombre_reticula',
        'id_carrera',
        'id_especialidad',
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
    protected $returnType = \App\Entities\Reticulas\Reticula::class;

    protected function initialize()
    {
        $this->carreraModel = new CarrerasModel();
        $this->especialidadModel = new EspecialidadModel();
    }
}
