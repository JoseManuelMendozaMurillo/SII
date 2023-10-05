<?php

namespace App\Validations\Reticulas;

class ReticulaValidation
{
    public array $rules = [
        'nombre_reticula' => [
            'label' => 'Nombre reticula',
            'rules' => 'required',
            'errors' => [
                'required' => 'es obligatorio',
            ],
        ],
        'id_carrera' => [
            'label' => 'ID carrera',
            'rules' => 'required',
            'errors' => [
                'required' => 'es obligatorio',
            ],
        ],
        'id_especialidad' => [
            'label' => 'ID especialidad',
            'rules' => 'required',
            'errors' => [
                'required' => 'es obligatorio',
            ],
        ],
    ];
}
