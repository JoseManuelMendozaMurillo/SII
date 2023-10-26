<?php

namespace App\Models\Reticulas;

// Carrera model

use CodeIgniter\Model;
use Exception;

class CarreraModel extends Model
{
    // members
    protected $nivelEscolarModel;

    // db
    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'nombre_carrera',
        'clave_carrera',
        'id_nivel_escolar',
        'fecha_inicio',
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
    protected $returnType = \App\Entities\Reticulas\Carrera::class;

    protected function initialize()
    {
        $this->nivelEscolarModel = new NivelEscolarModel();
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

    // Get with estatus != 3 and estatus != 4

    public function getAsArrayValidate()
    {
        $data = $this->where('estatus !=', 3)->where('estatus !=', 4)->findAll();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        return $array;
    }

    public function searchAndPaginate($searchPhrase, $rowCount, $start, $current)
    {
        $query = $this->db->table($this->table);

        if (!empty($searchPhrase)) {
            $query->like('nombre_carrera', $searchPhrase);
        }

        $query->orderBy('id_carrera', 'asc');

        $rowCount = (int) $rowCount;
        $start = (int) $start;

        $query->limit($rowCount, $start);

        return $query->get()->getResult();
    }

    public function countAllWithSearch($searchPhrase)
    {
        $query = $this->db->table($this->table);

        if (!empty($searchPhrase)) {
            $query->like('nombre_carrera', $searchPhrase);
        }

        return $query->countAllResults();
    }

    public function deleteAllCarrera($id_carrera)
    {
        $this->db->transStart();

        //$id_carrera = $this->request->getPost('id');

        // Elimina las asignaturas asociadas a la carrera.
        $this->asignaturaModel->deleteAsignaturasByCarrera($id_carrera);

        // Elimina las especialidades asociadas a la carrera.
        $this->especialidadModel->deleteEspecialidadesByCarrera($id_carrera);

        // Elimina la carrera.
        $this->carreraModel->delete($id_carrera);

        $this->db->transComplete();
    }
    // AsignaturaModel.php

    public function deleteAsignaturasByCarrera($id_carrera)
    {
        $this->db->table('asignaturas_carrera')->where('id_carrera', $id_carrera)->delete();
        $this->db->table('asignaturas_especialidad')->whereIn('id_asignatura', function ($builder) use ($id_carrera) {
            $builder->select('id_asignatura')->from('asignaturas_carrera')->where('id_carrera', $id_carrera);
        })->delete();
        $this->db->table('asignaturas')->whereIn('id_asignatura', function ($builder) use ($id_carrera) {
            $builder->select('id_asignatura')->from('asignaturas_carrera')->where('id_carrera', $id_carrera);
        })->delete();
    }
    // EspecialidadModel.php

    public function deleteEspecialidadesByCarrera($id_carrera)
    {
        $this->db->table('especialidades')->where('id_carrera', $id_carrera)->delete();
        $this->db->table('asignaturas_especialidad')->whereIn('id_especialidad', function ($builder) use ($id_carrera) {
            $builder->select('id_especialidad')->from('especialidades')->where('id_carrera', $id_carrera);
        })->delete();
    }
}
