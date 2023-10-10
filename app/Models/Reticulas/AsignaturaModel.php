<?php

// Asignatura model

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

    public function createMateria($data)
    {
        $datos = [
            'nombreMateria' => $data['nombreMateria'],
            'nombreAbreviado' => $data['nombreAbreviado'],
            'tipoAsignatura' => $data['tipoAsignatura'],
            'nivelEscolar' => $data['nivelEscolar'],
            'claveValue' => $data['claveValue'],
            'horasTeoricas' => $data['horasTeoricas'],
            'horasPracticas' => $data['horasPracticas'],
        ];

        $this->db->table('asignaturas')->insert($datos);

        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
