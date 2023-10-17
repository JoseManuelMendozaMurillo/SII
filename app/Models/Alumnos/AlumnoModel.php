<?php

namespace App\Models\Alumnos;

use CodeIgniter\Model;

class AlumnoModel extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';

    // protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'user_id',
        'no_control',
        'imagen',
        'curp',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'fecha_nacimiento',
        'genero',
        'estado_civil',
        'pais_nacimiento',
        'telefono',
        'email',
        'escuela_procedencia',
        'estado_escuela',
        'municipio_escuela',
        'ano_egreso',
        'promedio_general',
        'reticula',
        'turno_preferente',
        'ito_primera_opcion',
        'motivo_ingreso',
        'motivo_seleccion_plan_estudios',
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
    protected $returnType = \App\Entities\Alumnos\Alumno::class;
}
