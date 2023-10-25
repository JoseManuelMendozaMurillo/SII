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

    public function getAsArray()
    {
        $data = $this->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        return $array;
    }

    /**
     * Funcion para devolver el id de la asignaturas basicas (materias que se le imparten a mas de una carrera)
     *
     * @return string|null - Retorna null si no encuentra el tipo de asignatura
     */
    public function getIdAsignaturaBasica()
    {
        $idBasicas = $this->select('id_tipo_asignatura')->where('tipo_asignatura', 'Basica')->findAll();

        if (count($idBasicas) === 0) {
            return null;
        }

        return $idBasicas[0]['id_tipo_asignatura'];
    }

    /**
     * Funcion para devolver el id de la asignaturas genericas (materias de carrera)
     *
     * @return string|null - Retorna null si no encuentra el tipo de asignatura
     */
    public function getIdAsignaturaGenerica()
    {
        $idGenericas = $this->select('id_tipo_asignatura')->where('tipo_asignatura', 'Generica')->findAll();

        if (count($idGenericas) === 0) {
            return null;
        }

        return $idGenericas[0]['id_tipo_asignatura'];
    }

    /**
     * Funcion para devolver el id de la asignaturas especificas (materias de especialidad)
     *
     * @return string|null - Retorna null si no encuentra el tipo de asignatura
     */
    public function getIdAsignaturaEspecifica()
    {
        $idEspecifica = $this->select('id_tipo_asignatura')->where('tipo_asignatura', 'Especifica')->findAll();

        if (count($idEspecifica) === 0) {
            return null;
        }

        return $idEspecifica[0]['id_tipo_asignatura'];
    }
}
