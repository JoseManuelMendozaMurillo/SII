<?php

namespace App\Validations\Reticulas;

class ReticulaValidation
{
    public array $rules = [
        'nombre_reticula' => [
            'label' => 'Nombre reticula',
            //TODO: Crear una regla personalizada para validar el nombre de la reticula
            'rules' => 'required',
            'errors' => [
                'required' => 'El nombre de la reticula es obligatorio',
            ],
        ],

        'id_especialidad' => [
            'label' => 'ID especialidad',
            'rules' => 'required|is_not_unique[especialidades.id_especialidad]',
            'errors' => [
                'required' => 'El id de la especialidad es obligatorio',
                'is_not_unique' => 'El id de la especialidad no existe',
            ],
        ],

        'id_carrera' => [
            'label' => 'ID carrera',
            'rules' => 'required|is_not_unique[carreras.id_carrera]',
            'errors' => [
                'required' => 'El id de la carrera es obligatorio',
                'is_not_unique' => 'El id de la carrera no existe',
            ],
        ],

        'estatus' => [
            'label' => 'Estatus',
            'rules' => 'permit_empty|is_not_unique[estatus_reticula.id_estatus]',
            'errors' => [
                'is_not_unique' => 'El id del estatus no existe',
            ],
        ],

        'reticula_json' => [
            'label' => 'Json reticula',
            'rules' => 'permit_empty|valid_json',
            'errors' => [
                'valid_json' => 'El Json de la reticula no es valido',
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
    public array $requestGetReticulaJson = [
        'idReticula' => [
            'label' => 'Id reticula',
            'rules' => 'required|is_not_unique[reticulas.id_reticula]',
            'errors' => [
                'required' => 'El id de la reticula es obligatorio',
                'is_not_unique' => 'El id de la reticula no existe',
            ],
        ],
    ];
}
