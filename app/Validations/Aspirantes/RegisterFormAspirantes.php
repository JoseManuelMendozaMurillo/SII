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
        'curp' => [
            'rules' => 'required|alpha_numeric|is_unique[aspirantes.curp]', //campo de prueba
            'errors' => [
                'required' => 'El campo CURP es obligatorio',
                'is_unique' => 'Esta CURP ya está en uso',
            ],
        ],
        'name' => 'required|alpha_space',
        'surnamePaterno' => 'required|alpha_space',
        'surnameMaterno' => 'required|alpha_space',
        'birthDate' => 'required',
        'gender' => 'required',
        'maritalStatus' => 'required',
        'birthContry' => 'required',
        'phone' => 'required|numeric',
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
        'street' => 'required',
        'suburb' => 'required',
        'outN' => 'required|numeric',
        'intN' => 'permit_empty|numeric',
        'zipcode' => 'required|numeric',
        'city' => 'required',
        'state' => 'required',
        'betweenStreets' => 'required',

        //Datos complementarios
        'guardianName' => 'required|alpha_space',
        'guardianState' => 'required',
        'guardianIndigenousCommunity' => 'required',
        'guardianBloodType' => 'required',
        'discapacidad' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es requerido',
            ],
        ],
        'guardianIndigenousLanguage' => 'required',
        'guardianPhone' => 'required|numeric',

        //Escuela de procedencia
        'schoolName' => 'required',
        'schoolState' => 'required',
        'graduationYear' => 'required|numeric',
        'GPA' => 'required|numeric',
        'scholCity' => 'required',

        //---------------------------------------Solicitud del aspirante-----------------------------------------------
        'career' => 'required',
        'secondCareer' => 'required',
        'shift' => 'required',
        'firstOption' => 'required',
        'reasonSelectInstitute' => 'permit_empty',
        'reasonSelectStudyPlan' => 'permit_empty',

        //---------------------------------------Socioeconomicos del aspirante-----------------------------------------
        'fatherStudies' => 'required',
        'motherStudies' => 'required',
        'fatherStudies' => 'required',
        'liveWith' => 'required',
        'fathersJob' => 'required',
        'mothersJob' => 'required',
        'house' => 'required',
        'roomsHouse' => 'required|numeric',
        'peopleHouse' => 'required|numeric',
        'bathroomHouse' => 'required|numeric',
        'showerHouse' => 'required',
        'lightbulbsHouse' => 'required|numeric',
        'floorHouse' => 'required',
        'automobilesHouse' => 'required|numeric',
        'stoveHouse' => 'required',
    ];

    public function boolean(string $str, string $fields, array $data): bool
    {
        return filter_var($data['status'], FILTER_VALIDATE_BOOLEAN);
    }

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
