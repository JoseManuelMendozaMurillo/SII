<?php

namespace App\Models;

use App\Entities\Aspirante;
use CodeIgniter\Model;

class AspiranteModel extends Model
{
    protected $table = 'aspirantes';
    protected $allowedFields = [
        'user_id',
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
        'estado',
        'municipio',
        'egreso',
        'promedio_general',
        'carrera_primera_opcion',
        'carrera_segunda_opcion',
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
    protected $returnType = \App\Entities\Aspirante::class;

    /**
    * Locates an Aspirante object by ID.
    *
     * @param int|string $id
    */
    public function findById($id): ?Aspirante
    {
        return $this->find($id);
    }

    // TODO: Implementar queries necesarias, segun sea el requisito
    public function findByFullName($nombre, $apellido_paterno, $apellido_materno)
    {
        // $sql = 'select * from ' . $table . ' where nombre = :nombre: '
        //         . 'and apellido_paterno = :apellido_paterno: '
        //         . 'and apellido_materno = :apellido_materno:';

        // return $this->find->
    }

    public function findByCURP($curp)
    {
    }
}
