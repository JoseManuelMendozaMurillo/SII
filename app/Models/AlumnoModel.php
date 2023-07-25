<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumnoModel extends Model
{
    protected $table = 'Alumnos';
    protected $primaryKey = 'id_alumno';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nombre', 'num_control', 'id_carrera', 'semestre', 'id_grupo'];
    protected $returnType = 'object';
    protected $view = 'datos_alumnos';

    public function getAll()
    {
        $builder = $this->db->table($this->view);

        return $builder->get()->getResult();
    }

    public function getById($id)
    {
        return $this->find($id);
    }

    public function insertData($data)
    {
        return $this->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteData($id)
    {
        return $this->delete($id);
    }
}
