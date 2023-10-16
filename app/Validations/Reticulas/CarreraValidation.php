<?php

namespace App\Validations\Reticulas;

class CarreraValidation
{
    public array $rules = [
        'nombre_carrera' => [
            'label' => 'Nombre carrera',
            'rules' => 'required|max_length[255]|alpha_space',
            'errors' => [
                'required' => 'El nombre de la carrera es obligatorio',
                'max_length' => 'El nombre de la carrera no puede ser mayor a 255 caracteres',
                'alpha_space' => 'El nombre de la carrera solo puede contener letras',
            ],
        ],
        'clave_carrera' => [
            'label' => 'Clave oficial',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'La clave oficial es obligatoria',
                'max_length' => 'La clave oficial no puede ser mayor a 255 caracteres',
            ],
        ],
        // 'clave' => [
        //     'label' => 'Clave',
        //     'rules' => 'required|max_length[255]|alpha_numeric',
        //     'errors' => [
        //         'required' => 'La clave  es obligatoria',
        //         'max_length' => 'La clave  no puede ser mayor a 255 caracteres',
        //         'alpha_numeric' => 'El nombre abreviado de la asignatura solo puede
        //                              contener caracteres alfanumericos',
        //     ],
        // ],
        // 'siglas' => [
        //     'label' => 'Siglas',
        //     'rules' => 'required',
        //     'errors' => [

        //     ],
        // ],
        // 'creditos_totales' => [
        //     'label' => 'Creditos totales',
        //     'rules' => 'required|is_natural_no_zero|less_than[270]',
        //     'errors' => [
        //         'required' => '',
        //         'is_natural_no_zero' => '',
        //         'less_than' => '',
        //     ],
        // ],
        'id_nivel_escolar' => [
            'label' => 'ID nivel escolar',
            'rules' => 'required|in_list[1,2]',
            'errors' => [
                'required' => 'El ID del nivel escolar es obligatorio',
                'in_list' => 'No se selecciono un ID de nivel escolar existente',
            ],
        ],
        'fecha_inicio' => [
            'label' => 'Fecha de inicio',
            'rules' => 'required',
            'errors' => [

            ],
        ],
        // // TODO: Validad fechas
        // 'fecha_termino' => [
        //     'label' => 'Fecha de termino',
        //     'rules' => 'required',
        //     'errors' => [

        //     ],
        // ],
        // 'id_area_carr' => [
        //     'label' => 'ID area carrera',
        //     'rules' => 'required',
        //     'errors' => [

        //     ],
        // ],
        // // TODO: Ajustar niveles requeridos
        // 'id_nivel_carr' => [
        //     'label' => 'ID nivel carrera',
        //     'rules' => 'required|in_list[1,2]',
        //     'errors' => [
        //         'required' => 'El ID del nivel de carrera es obligatorio',
        //         'in_list' => 'No se selecciono un ID de nivel carrera existente',
        //     ],
        // ],
        // 'id_sub_area_carr' => [
        //     'label' => 'ID sub area carrera',
        //     'rules' => 'required|in_list[1,2]',
        //     'errors' => [
        //         'required' => 'El ID de sub area de carrera es obligatorio',
        //         'in_list' => 'No se selecciono un ID de de sub area de carrera existente',
        //     ],
        // ],
        // 'nivel' => [
        //     'label' => 'Nivel',
        //     'rules' => 'required',
        //     'errors' => [
        //         'required' => 'El nivel escolar es obligatorio',
        //         // 'in_list' => 'No se selecciono un ID de nivel escolar existente',
        //     ],
        // ],
    ];
}
