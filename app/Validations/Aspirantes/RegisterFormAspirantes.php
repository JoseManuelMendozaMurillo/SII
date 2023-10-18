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
                'alpha_numeric' => 'Este campo solo puede contener números y letras',
                'required' => 'El campo CURP es obligatorio',
                'is_unique' => 'Esta CURP ya está en uso',
            ],
        ],
        'nombre' => [
            'rules' => 'required|alphaSpaceAccent[nombre]',
            'errors' => [
                'alphaSpaceAccent' => 'El nombre solo puede contener letras y espacios',
            ],
        ],
        'apellidoPaterno' => [
            'rules' => 'required|alphaSpaceAccent[apellidoPaterno]',
            'errors' => [
                'alphaSpaceAccent' => 'El apellido paterno solo puede contener letras y espacios',
            ],
        ],
        'apellidoMaterno' => [
            'rules' => 'required|alphaSpaceAccent[apellidoMaterno]',
            'errors' => [
                'alphaSpaceAccent' => 'El apellido materno solo puede contener letras y espacios',
            ],
        ],
        'fechaNacimiento' => 'required', // Validar que sea menor a la fecha actual
        'genero' => 'required|in_list[MASCULINO,FEMENINO,OTRO]',
        'estadoCivil' => 'required|is_not_unique[estado_civil.id_estado_civil]',
        'paisNacimiento' => [
            'rules' => 'required|alphaSpaceAccent[paisNacimiento]', // Validar en una lista de paises
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del pais solo puede contener letras y espacios',
            ],
        ],
        'tel' => [
            'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]',
            'errors' => [
                'numeric' => 'El teléfono solo debe contener números',
                'regex_match' => 'Ingresa un número de teléfono válido de 10 dígitos',
            ],
        ],
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
        'calle' => [
            'rules' => 'required|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+)*$/]',
            'errors' => [
                'regex_match' => 'Ingresa una calle válida.',
            ],
        ],
        'colonia' => [
            'rules' => 'required|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+\\.?)*$/]',
            'errors' => [
                'regex_match' => 'Ingresa una colonia válida',
            ],
        ],
        'numExterior' => [
            'rules' => 'required|numeric|max_length[5]',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
                'max_length' => 'Este campo no puede contener mas de 5 números',
            ],
        ],
        'numInterior' => [
            'rules' => 'permit_empty|numeric|max_length[5]',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
                'max_length' => 'Este campo no puede contener mas de 5 números',
            ],
        ],
        'letraExterior' => [
            'rules' => 'permit_empty|alpha|max_length[4]',
            'errors' => [
                'alpha' => 'Este campo solo puede contener letras',
                'max_length' => 'Este campo no puede contener mas de 4 letras',
            ],
        ],
        'letraInterior' => [
            'rules' => 'permit_empty|alpha|max_length[4]',
            'errors' => [
                'alpha' => 'Este campo solo puede contener letras',
                'max_length' => 'Este campo no puede contener mas de 4 letras',
            ],
        ],
        'cp' => [
            'rules' => 'required|numeric|regex_match[/^[0-9]{5}$/]',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
                'regex_match' => 'Ingresa un código postal válido de 5 dígitos.',
            ],
        ],
        'municipioResidencia' => [
            'rules' => 'required|alphaSpaceAccent[municipioResidencia]', // Validar que el municipios sea valido
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del municipio solo puede contener letras y espacios',
            ],
        ],
        'estadoResidencia' => [
            'rules' => 'required|alphaSpaceAccent[estadoResidencia]', // Validar que el estado sea valido
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del estado solo puede contener letras y espacios',
            ],
        ],
        'entreCalles' => [
            'rules' => 'required|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+\\.*)*$/]',
            'errors' => [
                'regex_match' => 'Ingresa un valor válido (opcionalmente números y puntos al final de cada palabra)',
            ],
        ],

        //Datos complementarios
        'nombreTutor' => [
            'rules' => 'required|alphaSpaceAccent[nombreTutor]',
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del tutor solo puede contener letras y espacios',
            ],
        ],
        'estadoProcedencia' => [
            'rules' => 'required|alphaSpaceAccent[estadoProcedencia]', // Validar que el estado sea valido
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del estado solo puede contener letras y espacios',
            ],
        ],
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
        'discapacidad' => [
            'rules' => 'permit_empty|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)*$/]',
            'errors' => [
                'regex_match' => 'Ingresa un valor valido (Sin numeros y/o caracteres especiales)',
            ],
        ],
        'lenguaIndigena' => [
            'rules' => 'required|is_not_unique[lenguas_indigenas.id_lengua_indigena]',
            'errors' => [
                'required' => 'El campo del nivel de estudios es obligatorio',
                'is_not_unique' => 'La opcion seleccionada no es válida',
            ],
        ],
        'telTutor' => [
            'rules' => 'required|numeric|regex_match[/^[0-9]{10}$/]',
            'errors' => [
                'numeric' => 'El teléfono solo debe contener números',
                'regex_match' => 'Ingresa un número de teléfono válido de 10 dígitos',
            ],
        ],

        //Escuela de procedencia
        'estadoEscuela' => [
            'rules' => 'required|alphaSpaceAccent[estadoEscuela]', // Validar que el estado sea valido
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del estado solo puede contener letras y espacios',
            ],
        ],
        'municipioEscuela' => [
            'rules' => 'required|alphaSpaceAccent[municipioEscuela]', // Validar que el municipios sea valido
            'errors' => [
                'alphaSpaceAccent' => 'El nombre del municipio solo puede contener letras y espacios',
            ],
        ],
        'nombreEscuela' => [
            'rules' => 'required|regex_match[/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+\\.*)*$/]',
            'errors' => [
                'regex_match' => 'Ingresa un valor válido (opcionalmente números y puntos al final de cada palabra)',
            ],
        ],
        'anoEgreso' => [
            'rules' => 'required|numeric|regex_match[/^[0-9]{4}$/]',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
                'regex_match' => 'Ingresa un año válido (formato: YYYY)',
            ],
        ],
        'promedio' => [
            'rules' => 'required|decimal|regex_match[/^(?:100|[0-9]?[0-9](?:\\.[0-9]{1,2})?)$/]',
            'errors' => [
                'regex_match' => 'Ingresa un promedio válido (por ejemplo, 95.5)',
            ],
        ],

        //---------------------------------------Solicitud del aspirante-----------------------------------------------
        'primeraOpcionIngreso' => 'required|is_not_unique[carreras.id_carrera]',
        'segundaOpcionIngreso' => [
            'rules' => 'required|is_not_unique[carreras.id_carrera]|differs[primeraOpcionIngreso]',
            'errors' => [
                'differs' => 'La segunda opción debe ser diferente de la primera',
            ],
        ],
        'turno' => 'required|in_list[CUALQUIERA,MATUTINO,VESPERTINO]',
        'primeraOpcion' => 'required|in_list[SÍ,NO,PREFIERO NO DECIRLO]',
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
        'tipoPiso' => [
            'rules' => 'required|is_not_unique[tipos_piso.id_tipo_piso]',
            'errors' => [
                'required' => 'El campo tipo de piso es obligatorio',
                'is_not_unique' => 'El tipo de piso seleccionado no es válido',
            ],
        ],

        'cantidadCuartos' => [
            'rules' => 'required|numeric',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
            ],
        ],
        'cantidadCohabitantes' => [
            'rules' => 'required|numeric',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
            ],
        ],
        'cantidadBanos' => [
            'rules' => 'required|numeric',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
            ],
        ],
        'cantidadAutos' => [
            'rules' => 'required|numeric',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
            ],
        ],
        'cantidadFocos' => [
            'rules' => 'required|numeric',
            'errors' => [
                'numeric' => 'Este campo solo puede contener números',
            ],
        ],

        'regaderas' => 'required|in_list[0,1]',
        'estufa' => 'required|in_list[S,N]',

    ];

    /**
     * Reglas de validacion para cambiar el estatus de pago de un aspirante
     *
     * @var array $rulesChageStatusPaymentAspirante
     */
    public array $rulesChageStatusPaymentAspirante = [
        'idAspirante' => [
            'rules' => 'required|numeric|is_not_unique[aspirantes.id_aspirante]',
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
