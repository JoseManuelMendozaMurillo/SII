<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class TipoAsignaturaModel extends Model
{
    protected $table = 'tipo_asignatura';
    protected $primaryKey = 'id_tipo_asignatura';
    protected $allowedFields = [
        'tipo_asignatura',
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
}
