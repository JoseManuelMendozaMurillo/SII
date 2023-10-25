<?php

namespace App\Validations\Reticulas;

class EspecialidadValidation
{
    public array $rules = [
        'id_carrera' => [
            'label' => 'ID carrera',
            'rules' => 'required|in_list[1,2]',
            'errors' => [
                'required' => 'El ID carrera es obligatorio',
                'in_list' => 'No se selecciono un ID carrera existente',
            ],
        ],                   // Uses ID, CarrerasModel neede => []d
        'nombre_especialidad' => [
            'label' => 'Nombre especialidad',
            'rules' => 'required|max_length[255]|alpha_space',
            'errors' => [
                'required' => 'El nombre de la especialidad es obligatorio',
                'max_length' => 'El nombre de la especialidad no puede ser mayor a 255 caracteres',
                'alpha_space' => 'El nombre de la especialidad solo puede contener letras',
            ],
        ],
        'clave_especialidad' => [
            'label' => 'Clave especialidad',
            'rules' => 'required|max_length[255]|alpha_numeric_punct',
            'errors' => [
                'required' => 'La clave de la especialidad es obligatoria',
                'max_length' => 'La clave de la especialidad no puede exceder 255 caracteres',
            ],
        ],
        'fecha_inicio' => [
            'label' => 'Fecha de inicio',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        'id_nivel_escolar' => [
            'label' => 'ID nivel escolar',
            'rules' => 'required|in_list[1,2]',
            'errors' => [
                'required' => 'El ID del nivel escolar es obligatorio',
                'in_list' => 'No se selecciono un ID de nivel escolar existente',
            ],
        ],
    ];
}
