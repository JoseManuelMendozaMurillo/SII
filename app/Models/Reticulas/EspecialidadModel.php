<?php

namespace App\Models\Reticulas;

// Especialidad Model

use App\Models\ServiciosEscolares\CarrerasModel;
use CodeIgniter\Model;

class EspecialidadModel extends Model
{
    // members
    protected $carreraModel;

    // db
    protected $table = 'especialidades';
    protected $primaryKey = 'id_especialidad';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_carrera',                   // Uses ID, CarrerasModel needed
        'nombre_especialidad',
        'clave_especialidad',
        'fecha_inicio',
        'id_nivel_escolar',
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
    protected $returnType = \App\Entities\Reticulas\Especialidad::class;

    protected function initialize()
    {
        $this->carreraModel = new CarrerasModel();
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

    /**
     * Función para obtener las especialidades que no pertencen a una reticula
     *
     * @param $id_carrera - Id de la carrera a obtener sus especialdades
     */
    public function getWithoutReticula($id_carrera)
    {
        // Construimos la consulta
        $builder = $this->db->table('especialidades as esp')
                        ->select('esp.id_especialidad, 
                                  esp.id_carrera, 
                                  esp.nombre_especialidad,
                                  esp.clave_especialidad,
                                  fecha_inicio, 
                                  esp.estatus')
                        ->join('reticulas as ret', 'esp.id_carrera = ret.id_carrera')
                        ->where('esp.id_especialidad <> ret.id_especialidad')
                        ->where('esp.id_carrera', $id_carrera);
        // Ejecuta la consulta y obtén los resultados
        $query = $builder->get();
        $results = $query->getResult();

        return $results;
    }
}
