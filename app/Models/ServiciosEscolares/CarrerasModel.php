<?php

namespace App\Models\ServiciosEscolares;

use CodeIgniter\Model;

class CarrerasModel extends Model
{
    /* Configuracion del modelo */
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
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
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

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
