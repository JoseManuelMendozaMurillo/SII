<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class EstatusModel extends Model
{
    // db
    protected $table = 'estatus_reticula';
    protected $primaryKey = 'id_estatus';
    protected $allowedFields = [
        'id_estatus',
        'estatus',
    ];

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
     * Función para obtener el id del estatus segun su identificador
     */
    public function getIdByEstatus($estatus)
    {
        $result = $this->select('id_estatus')->where(['estatus' => $estatus])->get()->getRow();

        if ($result === null) {
            return null;
        }

        return $result->id_estatus;
    }

    /**
     * Función para obtener el identificador del estatus segun su id
     */
    public function getEstatusById($id)
    {
        $result = $this->select('estatus')->where(['id_estatus' => $id])->get()->getRow();

        if ($result === null) {
            return null;
        }

        return $result->estatus;
    }
}
