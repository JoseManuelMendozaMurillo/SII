<?php

namespace App\Validations\Aspirantes;

use App\Validations\CustomRules;

/**
 * Clase que contiene las relgas de validación para el formulario de registro de aspirantes
 */
class RegisterFormAspirantes
{
    /**
     * Reglas de validacion para el formulario de registro de aspirantes
     *
     * @var array rulesRegisterFormAspirante
     */
    public array $rulesRegisterFormAspirante = [
        //---------------------------------------Informacion personal-------------------------------------------------
        //Informacion del aspirante

        'imagen' => [
            'rules' => 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]
                        |mime_in[imagen,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'uploaded' => 'Debe subir una foto',
                'max_size' => 'El tamaño máximo de la foto es de 4MB',
                'is_image' => 'El archivo subido no es una imagen válida',
                'mime_in' => 'El archivo subido no es una imagen válida',
            ],

        ],

        'curp' => [
            'rules' => 'required|alpha_numeric|is_unique[aspirantes.curp]', //campo de prueba
            'errors' => [
                'required' => 'El campo CURP es obligatorio',
                'is_unique' => 'Esta CURP ya está en uso',
            ],
        ],
        'nombre' => 'required|alpha_space',
        'apellido_paterno' => 'required|alpha_space',
        'apellido_materno' => 'required|alpha_space',
        'fecha_nacimiento' => 'required',
        'genero' => 'required',
        'estado_civil' => 'required',
        'pais_nacimiento' => 'required',
        'telefono' => 'required|numeric',
        'email' => [
            'rules' => 'required|valid_email|is_unique[aspirantes.email]', //campo de prueba
            'errors' => [
                'required' => 'El campo correo electrónico es obligatorio',
                'valid_email' => 'Debe proporcionar un correo electrónico válido',
                'is_unique' => 'El correo electrónico ya está en uso',
            ],
        ],
        'confirmEmail' => 'required|matches[email]',

        //Domicilio actual
        'calle_domicilio' => 'required',
        'colonia' => 'required',
        'no_exterior' => 'required|numeric',
        'no_interior' => 'permit_empty|numeric',
        'codigo_postal' => 'required|numeric',
        'municipio' => 'required',
        'estado' => 'required',
        'entre_calles' => 'required',

        //Datos complementarios
        'tutor' => 'required|alpha_space',
        'estado_procedencia' => 'required',
        'comunidad_indigena' => [
            'rules' => 'required|callback_checkCatalog[comunidades_indigenas.comunidad]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'checkCatalog' => 'La opcion seleccionada no es válida',
            ],
        ],
        'tipo_sangre' => [
            'rules' => 'required|callback_checkCatalog[tipos_sangre.tipo]',
            'errors' => [
                'required' => 'El campo tipo de sangre es obligatorio',
                'checkCatalog' => 'El tipo de sangre seleccionado no es válido',
            ],
        ],
        'discapacidad' => 'required',
        'lengua_indigena' => [
            'rules' => 'required|callback_checkCatalog[lenguas_indigenas.lengua]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'checkCatalog' => 'La opcion seleccionada no es válida',
            ],
        ],
        'telefono_contacto' => 'required|numeric',

        //Escuela de procedencia
        'escuela_procedencia' => 'required',
        'estado_escuela' => 'required',
        'ano_egreso' => 'required|numeric',
        'promedio_general' => 'required|numeric',
        'municipio_escuela' => 'required',

        //---------------------------------------Solicitud del aspirante-----------------------------------------------
        'carrera_primera_opcion' => 'required',
        'carrera_segunda_opcion' => 'required',
        'turno_preferente' => 'required',
        'ito_primer_opcion' => 'required',
        'motivo_ingreso' => [
            'rules' => 'required|callback_checkCatalog[motivos_ingreso.motivo]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'checkCatalog' => 'La opcion seleccionada no es válida',
            ],
        ],
        'motivo_seleccion_plan_estudios' => 'permit_empty',

        //---------------------------------------Socioeconomicos del aspirante-----------------------------------------
        'nivel_estudio_padre' => [
            'rules' => 'required|callback_checkCatalog[nivel_estudios.nivel]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'checkCatalog' => 'La opcion seleccionada no es válida',
            ],
        ],
        'nivel_estudio_madre' => [
            'rules' => 'required|callback_checkCatalog[nivel_estudios.nivel]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'checkCatalog' => 'La opcion seleccionada no es válida',
            ],
        ],
        'vives_actualmente' => [
            'rules' => 'required|callback_checkCatalog[cohabitantes.cohabitantes]',
            'errors' => [
                'required' => 'El campo de los cohabitantes obligatorio',
                'checkCatalog' => 'La opcion seleccionada no es válida',
            ],
        ],
        'ocupacion_padre' => [
            'rules' => 'required|callback_checkCatalog[ocupaciones.ocupacion]',
            'errors' => [
                'required' => 'El campo ocupacion del padre es obligatorio',
                'checkCatalog' => 'La ocupacion seleccionada no es válida',
            ],
        ],
        'ocupacion_madre' => [
            'rules' => 'required|callback_checkCatalog[ocupaciones.ocupacion]',
            'errors' => [
                'required' => 'El campo ocupacion de la madre es obligatorio',
                'checkCatalog' => 'La ocupacion seleccionada no es válida',
            ],
        ],
        'casa_resides' => [
            'rules' => 'required|callback_checkCatalog[propiedad_vivienda.propiedad]',
            'errors' => [
                'required' => 'El campo tipo de vivienda es obligatorio',
                'checkCatalog' => 'El tipo de vivienda seleccionado no es válido',
            ],
        ],
        'no_cuartos' => 'required|numeric',
        'no_miembros' => 'required|numeric',
        'no_banos' => 'required|numeric',
        'regadera' => 'required',
        'no_focos' => 'required|numeric',
        'tipo_piso' => [
            'rules' => 'required|callback_checkCatalog[tipos_pisos.tipo_piso]',
            'errors' => [
                'required' => 'El campo tipo de piso es obligatorio',
                'checkCatalog' => 'El tipo de piso seleccionado no es válido',
            ],
        ],
        'no_automoviles' => 'required|numeric',
        'estufa' => 'required',
    ];

    /**
     * Reglas de validacion para cambiar el estatus de pago de un aspirante
     *
     * @var array $rulesChageStatusPaymentAspirante
     */
    public array $rulesChageStatusPaymentAspirante = [
        'idAspirante' => [
            'rules' => 'required|numeric|is_not_unique[aspirantes.id_aspirante]', //campo de prueba
            'errors' => [
                'required' => 'El id del aspirante es requerido',
                'numeric' => 'El id del aspirante solo puede contener números',
                'is_not_unique' => 'El id del aspirante no existe',
            ],
        ],
        'status' => [
            'rules' => 'validBool[status]',
            'errors' => [
                'validBool' => 'El campo status debe ser booleano',
            ],
        ],
    ];
}
