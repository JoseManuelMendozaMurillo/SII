<?php

namespace App\Controllers\Test\Validate;

use App\Controllers\Test\Validate\CustomValidations;

function validateLoginUser()
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

function validateCandidate()
{
    $validation = service('validation');

    $validation->setRules([
        'email' => 'required|valid_email|CustomValidations.ValidateEmail',
        'password' => 'required',
    ]);
}
