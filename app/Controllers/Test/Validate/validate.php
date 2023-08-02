<?php

namespace App\Controllers\Test\Validate;

use App\Controllers\Test\Validate\CustomValidations;

function validateLogin()
{
    $validation = service('validation');

    $validation->setRules([
        'email' => 'required|valid_email|CustomValidations.ValidateEmail',
        'password' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $model = new UserModel(); // Necesitamos mas trabajo en el modelo UserModel

    $user = $model->where('email', $email)->first();

    if ($user) {
        // Comprueba si la contraseña es correcta
        if (password_verify($password, $user['password'])) {// password_verify si estamos usando el metodo password_hash
            // La contraseña es correcta, inicia la sesión
            session()->set('user', $user);

            return redirect()->to('/Inicio xd'); // Dirigir a la pagina de inicio o mandar un booleano
        } else {
            // La contraseña es incorrecta
            return redirect()->back()->with('error', 'La contraseña es incorrecta.');
        }
    } else {
        // No se encontro al usuario
        return redirect()->back()->with('error', 'No existe ningún usuario con ese correo electrónico.');
    }
}

function validateSingup()
{
    $validation = service('validation');

    $validation->setRules([
        //Informacion de la cuenta
        'email' => [
            'rules' => 'required|valid_email|is_unique[alumnos.email]',
            'errors' => [
                'required' => 'El campo correo electrónico es obligatorio',
                'valid_email' => 'Debe proporcionar un correo electrónico válido',
                'is_unique' => 'El correo electrónico ya está en uso',
            ],
        ],
        'confirmEmail' => 'required|matches[email]',
        'password' => 'required|min_length[8]',
        'confirmPassword' => 'required|matches[password]',

        //Informacion personal
        'curp' => [
            'rules' => 'required|alpha_numeric|is_unique[alumnos.curp]',
            'errors' => [
                'required' => 'El campo CURP es obligatorio',
                'is_unique' => 'Esta CURP ya está en uso',
            ],
        ],
        'nameInfo' => 'required|alpha_space',
        'surnamePaterno' => 'required|alpha_space',
        'surnameMaterno' => 'required|alpha_space',
        'birthDate' => 'required',
        'gender' => 'required',
        'maritalStatus' => 'required',
        'birthContry' => 'required',
        'phone1' => 'required|numeric',
        'phone1' => 'permit_empty|numeric',

        //Informacion del domicilio
        'street' => 'required',
        'suburb' => 'required',
        'outN' => 'required|numeric',
        'intN' => 'permit_empty|numeric',
        'zipcode' => 'required|numeric',
        'city' => 'required',
        'state' => 'required',
        'betweenStreets' => 'required',
    ]);
}
