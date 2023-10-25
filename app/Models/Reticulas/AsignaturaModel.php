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
        'id_tipo_asignatura',
        'id_nivel_escolar',
        'clave_asignatura',
        'horas_teoricas',
        'horas_practicas',
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
    protected $returnType = \App\Entities\Reticulas\Asignatura::class;

    protected function initialize()
    {
        $this->tipoAsignaturaModel = new TipoAsignaturaModel();
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

    public function isBasica($id_asignatura)
    {
        $typeAsignatura = $this->select('id_tipo_asignatura')->find($id_asignatura);

        // Si la asignatura no existe retornamos null
        if ($typeAsignatura === null) {
            return null;
        }

        if ($typeAsignatura->id_tipo_asignatura === $this->tipoAsignaturaModel->getIdAsignaturaBasica()) {
            return true;
        }

        return false;
    }

    public function isGenerica($id_asignatura)
    {
        $typeAsignatura = $this->select('id_tipo_asignatura')->find($id_asignatura);

        // Si la asignatura no existe retornamos null
        if ($typeAsignatura === null) {
            return null;
        }

        if ($typeAsignatura->id_tipo_asignatura === $this->tipoAsignaturaModel->getIdAsignaturaGenerica()) {
            return true;
        }

        return false;
    }

    public function isEspecifica($id_asignatura)
    {
        $typeAsignatura = $this->select('id_tipo_asignatura')->find($id_asignatura);

        // Si la asignatura no existe retornamos null
        if ($typeAsignatura === null) {
            return null;
        }

        if ($typeAsignatura->id_tipo_asignatura === $this->tipoAsignaturaModel->getIdAsignaturaEspecifica()) {
            return true;
        }

        return false;
    }
}
