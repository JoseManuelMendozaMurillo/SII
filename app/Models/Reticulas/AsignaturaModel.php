<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class AsignaturaModel extends Model
{
    protected $tipoAsignaturaModel;

    // db
    protected $table = 'asignaturas';
    protected $primaryKey = 'id_asignatura';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nombre_asignatura',
        'nombre_abreviado_asignatura',
        'id_tipo_asignatura',
        'id_nivel_escolar',
        'clave_asignatura',
        'horas_teoricas',
        'horas_practicas',
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
    protected $returnType = \App\Entities\Reticulas\Asignatura::class;

    protected function initialize()
    {
        $this->tipoAsignaturaModel = new TipoAsignaturaModel();
    }
}
