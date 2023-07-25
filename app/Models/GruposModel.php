<?php

namespace App\Models;

use CodeIgniter\Model;

class GruposModel extends Model
{
    protected $table = 'Grupos';
    protected $primaryKey = 'id_grupo';
    protected $returnType = 'object';

    public function getBy($id_carrera, $semestre)
    {
        return $this->where('id_carrera', $id_carrera)
                    ->where('semestre', $semestre)
                    ->findAll();
    }
}
