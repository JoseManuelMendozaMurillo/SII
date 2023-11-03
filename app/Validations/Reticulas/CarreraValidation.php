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
            'rules' => 'required|max_length[255]|is_unique[carreras.clave_carrera]',
            'errors' => [
                'required' => 'La clave de la asignatura es obligatoria',
                'max_length' => 'La clave de la asignatura no puede exceder 255 caracteres',
                'is_unique' => 'La clave ya está en uso',
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
        'fecha_inicio' => [
            'label' => 'Fecha de inicio',
            'rules' => 'required',
            'errors' => [

            ],
        ],
    ];
    public array $rulesChageStatusCarrera = [
        'id_carrera' => [
            'rules' => 'required|numeric|is_not_unique[carreras.id_carrera]',
            'errors' => [
                'required' => 'El id es requerido',
                'numeric' => 'El id solo puede contener números',
                'is_not_unique' => 'El id no existe',
            ],
        ],
    ];
}
