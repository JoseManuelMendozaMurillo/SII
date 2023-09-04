<?php

namespace App\Entities\Aspirantes;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Aspirante extends Entity
{
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $attributes = [
        // Tabla principal
        'id_aspirante' => null,
        'user_id' => null,
        'no_solicitud' => null,
        'nip' => null,
        'estatus_pago' => false,
        'imagen' => null,
        'curp' => null,
        'apellido_paterno' => null,
        'apellido_materno' => null,
        'nombre' => null,
        'fecha_nacimiento' => null,
        'genero' => null,
        'estado_civil' => null,
        'pais_nacimiento' => null,
        'telefono' => null,
        'email' => null,
        'escuela_procedencia' => null,
        'estado_escuela' => null,
        'municipio_escuela' => null,
        'ano_egreso' => null,
        'promedio_general' => null,
        'carrera_primera_opcion' => null,
        'carrera_segunda_opcion' => null,
        'turno_preferente' => null,
        'ito_primer_opcion' => null,
        'motivo_ingreso' => null,
        'motivo_seleccion_plan_estudios' => null,
        // Tabla secundaria
        'calle_domicilio' => null,
        'no_exterior' => null,
        'no_interior' => null,
        'letra_exterior' => null,
        'letra_interior' => null,
        'colonia' => null,
        'estado' => null,
        'municipio' => null,
        'codigo_postal' => null,
        'entre_calles' => null,
        'tutor' => null,
        'estado_procedencia' => null,
        'comunidad_indigena' => null,
        'tipo_sangre' => null,
        'discapacidad' => null,
        'lengua_indigena' => null,
        'telefono_contacto' => null,
        'nivel_estudio_padre' => null,
        'nivel_estudio_madre' => null,
        'vives_actualmente' => null,
        'ocupacion_padre' => null,
        'ocupacion_madre' => null,
        'casa_resides' => null,
        'no_cuartos' => null,
        'no_miembros' => null,
        'regadera' => null,
        'no_banos' => null,
        'no_focos' => null,
        'tipo_piso' => null,
        'no_automoviles' => null,
        'estufa' => null,
        // Campos de ambas tablas
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
        'created_by' => null,
        'updated_by' => null,
        'deleted_by' => null,
        // Campos de utilidad que no estan dentro de las tablas de aspirantes
        'nipHash' => null,
    ];

    public function __construct(array $data = null)
    {
        parent::__construct($data);

        if (!empty($this->attributes['nip'])) {
            $this->setNipHash($this->attributes['nip']);
        }

        if (!empty($this->attributes['no_interior'])) {
            $this->setNumeroInterior($this->attributes['no_interior']);
        }

        if (!empty($this->attributes['letra_exterior'])) {
            $this->setLetraExterior($this->attributes['letra_exterior']);
        }

        if (!empty($this->attributes['letra_interior'])) {
            $this->setLetraInterior($this->attributes['letra_interior']);
        }
    }

    protected function setNipHash(string $nip)
    {
        $this->attributes['nipHash'] = service('passwords')->hash($nip);
    }

    protected function setNumeroInterior(?string $numInterior)
    {
        $this->attributes['no_interior'] = $numInterior != '' ? $numInterior : null;
    }

    protected function setLetraInterior(?string $letraInterior)
    {
        $this->attributes['letra_interior'] = $letraInterior != '' ? $letraInterior : null;
    }

    protected function setLetraExterior(?string $letraExterior)
    {
        $this->attributes['letra_exterior'] = $letraExterior != '' ? $letraExterior : null;
    }

    protected function setFechaNacimiento(string $dateString)
    {
        $fecha = new Time($dateString, 'UTC');
        $formattedDate = $fecha->format('Y-m-d'); // Formato YYYY-MM-DD
        $this->attributes['fecha_nacimiento'] = $formattedDate;
    }
}
