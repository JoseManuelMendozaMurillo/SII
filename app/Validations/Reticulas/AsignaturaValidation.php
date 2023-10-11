<?php

namespace App\Validations\Reticulas;

class AsignaturaValidation
{
    public array $rules = [
        'nombre_asignatura' => [
            'label' => 'Nombre asignatura',
            'rules' => 'required|max_length[255]|alpha_space',
            'errors' => [
                'required' => 'El nombre de la asignatura es obligatorio',
                'max_length' => 'El nombre de la asignatura no puede ser mayor a 255 caracteres',
                'alpha_space' => 'El nombre de la asignatura solo puede contener letras',
            ],
        ],
        'nombre_abreviado_asignatura' => [
            'label' => 'Nombre abreviado asignatura',
            'rules' => 'max_length[255]|alpha',
            'errors' => [
                'max_length' => 'El nombre abreviado no puede ser mayor a 255 caracteres',
                'alpha' => 'El nombre abreviado de la asignatura solo puede contener letras',
            ],
        ],
        'id_tipo_asignatura' => [
            'label' => 'ID tipo de asignatura',
            'rules' => 'required|in_list[1,2,3]',
            'errors' => [
                'required' => 'El ID del tipo de asignatura es obligatorio',
                'in_list' => 'No se selecciono un ID de tipo de asignatura existente',
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
        'clave_asignatura' => [
            'label' => 'Clave asignatura',
            'rules' => 'required|max_length[255]|alpha_numeric_punct',
            'errors' => [
                'required' => 'La clave de la asignatura es obligatoria',
                'max_length' => 'La clave de la asignatura no puede exceder 255 caracteres',
            ],
        ],
        'horas_teoricas' => [
            'label' => 'Horas teoricas',
            'rules' => 'required|is_natural_no_zero|less_than[10]',
            'errors' => [
                'required' => 'El numero de horas teoricas es obligatorio',
                'is_natural_no_zero' => 'El numero de horas teoricas debe ser un numero natural, no menor a 2',
                'less_than' => 'El numero de horas teoricas no puede exceder 10 horas',
            ],
        ],
        'horas_practicas' => [
            'label' => 'Horas practicas',
            'rules' => 'required|is_natural_no_zero|less_than[10]',
            'errors' => [
                'required' => 'El numero de horas practicas es obligatorio',
                'is_natural_no_zero' => 'El numero de horas practicas debe ser un numero natural, no menor a 2',
                'less_than' => 'El numero de horas practicas no puede exceder 10 horas',
            ],
        ],
    ];
}