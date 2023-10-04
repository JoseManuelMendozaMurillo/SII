<?php

namespace App\Validations\Reticulas;

class EspecialidadValidation
{
    public array $rules = [
        'id_carrera' => [
            'label' => 'ID carrera',
            'rules' => 'required',
            'errors' => [

            ],
        ],                   // Uses ID, CarrerasModel neede => []d
        'nombre_especialidad' => [
            'label' => 'Nombre especialidad',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'clave' => [
            'label' => 'Clave',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'clave_oficial' => [
            'label' => 'Clave oficial',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'creditos_especialidad' => [
            'label' => 'Creditos especialidad',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'nombre_reducido' => [
            'label' => 'Nombre reducido',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'siglas' => [
            'label' => 'Siglas',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'fecha_inicio' => [
            'label' => 'Fecha de inicio',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'fecha_termino' => [
            'label' => 'Fecha de termino',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'id_nivel_escolar' => [
            'label' => 'ID nivel escolar',
            'rules' => 'required',
            'errors' => [

            ],
        ],
    ];
}
