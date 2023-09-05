<?php

namespace App\Validations\Aspirantes;

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

        'foto' => [
            'rules' => 'uploaded[foto]|max_size[foto,5120]|is_image[foto]
                        |mime_in[foto,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'uploaded' => 'Debe subir una foto',
                'max_size' => 'El tamaño máximo de la foto es de 5MB',
                'is_image' => 'El archivo subido no es una foto válida',
                'mime_in' => 'El archivo subido no es una foto válida',
            ],

        ],

        'curp' => [
            'rules' => 'required|alpha_numeric|is_unique[aspirantes.curp]
            |regex_match[/^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9A-Z]{2}$/]',
            'errors' => [
                'required' => 'El campo CURP es obligatorio',
                'is_unique' => 'Esta CURP ya está en uso',
            ],
        ],
        'nombre' => 'required|alphaSpaceAccent[nombre]',
        'apellidoPaterno' => 'required|alphaSpaceAccent[apellidoPaterno]',
        'apellidoMaterno' => 'required|alphaSpaceAccent[apellidoMaterno]',
        'fechaNacimiento' => 'required',
        'genero' => 'required',
        'estadoCivil' => 'required',
        'paisNacimiento' => 'required',
        'tel' => 'required|numeric|regex_match[/^[0-9]{10}$/]',
        'correo' => [
            'rules' => 'required|valid_email|is_unique[aspirantes.email]', //campo de prueba
            'errors' => [
                'required' => 'El campo correo electrónico es obligatorio',
                'valid_email' => 'Debe proporcionar un correo electrónico válido',
                'is_unique' => 'El correo electrónico ya está en uso',
            ],
        ],
        'confirmCorreo' => 'required|matches[correo]',

        //Domicilio actual
        'calle' => 'required',
        'colonia' => 'required',
        'numExterior' => 'required|numeric',
        'numInterior' => 'permit_empty|numeric',
        'letraExterior' => 'permit_empty|alphaSpaceAccent[letraExterior]',
        'letraInterior' => 'permit_empty|alphaSpaceAccent[letraInterior]',
        'cp' => 'required|numeric|regex_match[/^[0-9]{5}$/]',
        'municipioResidencia' => 'required|alphaSpaceAccent[municipioResidencia]',
        'estadoResidencia' => 'required|alphaSpaceAccent[estadoResidencia]',
        'entreCalles' => 'required',

        //Datos complementarios
        'nombreTutor' => 'required|alphaSpaceAccent[nombreTutor]',
        'estadoProcedencia' => 'required',
        'comunidadIndigena' => [
            'rules' => 'required|is_not_unique[comunidades_indigenas.id_comunidad_indigena]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'tipoSangre' => [
            'rules' => 'required|is_not_unique[tipos_sangre.id_tipo_sangre]',
            'errors' => [
                'required' => 'El campo tipo de sangre es obligatorio',
                'is_not_unique' => 'El tipo de sangre seleccionado no es válido',
            ],
        ],
        'discapacidad' => 'required',
        'lenguaIndigena' => [
            'rules' => 'required|is_not_unique[lenguas_indigenas.id_lengua_indigena]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'telTutor' => 'required|numeric',

        //Escuela de procedencia
        'nombreEscuela' => 'required',
        'estadoEscuela' => 'required',
        'anoEgreso' => 'required|numeric|regex_match[/^[0-9]{4}$/]',
        'promedio' => 'required|decimal|regex_match[/^(?:100|[0-9]?[0-9](?:\\.[0-9]{1,2})?)$/]',
        'municipioEscuela' => 'required',

        //---------------------------------------Solicitud del aspirante-----------------------------------------------
        'primeraOpcionIngreso' => 'required',
        'segundaOpcionIngreso' => 'required',
        'turno' => 'required',
        'primeraOpcion' => 'required',
        'motivoIngreso' => [
            'rules' => 'required|is_not_unique[motivos_ingreso.id_motivo_ingreso]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'motivoSeleccionPlanEstudio' => 'permit_empty',

        //---------------------------------------Socioeconomicos del aspirante-----------------------------------------
        'nivelEstudioPadre' => [
            'rules' => 'required|is_not_unique[nivel_estudios.id_nivel_estudio]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'nivelEstudioMadre' => [
            'rules' => 'required|is_not_unique[nivel_estudios.id_nivel_estudio]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'cohabitantes' => [
            'rules' => 'required|is_not_unique[cohabitantes.id_cohabitante]',
            'errors' => [
                'required' => 'El campo de los cohabitantes obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'ocupacionPadre' => [
            'rules' => 'required|is_not_unique[ocupaciones.id_ocupacion]',
            'errors' => [
                'required' => 'El campo ocupacion del padre es obligatorio',
                'is_not_unique' => 'La ocupacion seleccionada no es válida',
            ],
        ],
        'ocupacionMadre' => [
            'rules' => 'required|is_not_unique[ocupaciones.id_ocupacion]',
            'errors' => [
                'required' => 'El campo ocupacion de la madre es obligatorio',
                'is_not_unique' => 'La ocupacion seleccionada no es válida',
            ],
        ],
        'propiedadCasa' => [
            'rules' => 'required|is_not_unique[propiedad_vivienda.id_propiedad_vivienda]',
            'errors' => [
                'required' => 'El campo tipo de vivienda es obligatorio',
                'is_not_unique' => 'El tipo de vivienda seleccionado no es válido',
            ],
        ],
        'cantidadCuartos' => 'required|numeric',
        'cantidadCohabitantes' => 'required|numeric',
        'cantidadBanos' => 'required|numeric',
        'regaderas' => 'required',
        'cantidadFocos' => 'required|numeric',
        'tipoPiso' => [
            'rules' => 'required|is_not_unique[tipos_piso.id_tipo_piso]',
            'errors' => [
                'required' => 'El campo tipo de piso es obligatorio',
                'is_not_unique' => 'El tipo de piso seleccionado no es válido',
            ],
        ],
        'cantidadAutos' => 'required|numeric',
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
