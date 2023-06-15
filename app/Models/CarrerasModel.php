<?php 

namespace App\Models;

use CodeIgniter\Model;

class CarrerasModel extends Model
{
    protected $table = "Carreras";
    protected $primaryKey = "id_carrera";
    protected $returnType = 'object';

    public function get_all(){
        return $this->findAll();
    }
}