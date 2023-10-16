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
    public array $requestSaveJsonReticula = [
        'idReticula' => [
            'label' => 'Id reticula',
            'rules' => 'required|is_not_unique[reticulas.id_reticula]',
            'errors' => [
                'required' => 'El id de la reticula es obligatorio',
                'is_not_unique' => 'El id de la reticula no existe',
            ],
        ],
        'jsonReticula' => [
            'label' => 'Json reticula',
            'rules' => 'required|valid_json',
            'errors' => [
                'required' => 'El Json de la reticula es obligatorio',
                'valid_json' => 'El Json de la reticula no es valido',
            ],
        ],
    ];
}
