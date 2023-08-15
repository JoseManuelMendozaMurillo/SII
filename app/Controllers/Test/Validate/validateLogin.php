<?php

namespace App\Controllers\Test\Validate;

use App\Controllers\Test\Validate\CustomValidations;
use App\Models\UserModel;

function validate($fields, $rules, $errorRedirect)
{
    $validation = service('validation');

    $validation->setRules($rules);

    if (!$validation->withRequest(service('request'))->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $model = new UserModel();

    $user = $model->where($fields[0], service('request')->request->getPost($fields[0]))->first();

    if ($user) {
        $value = service('request')->request->getPost($fields[1]);

        if (password_verify($value, $user[$fields[1]])) {
            session()->set('user', $user);

            return redirect()->to('Inicio'); // Dirigir a la página de inicio
        } else {
            return redirect()->back()->with('error', $errorRedirect);
        }
    } else {
        return redirect()->back()->with('error', 'No se encontró el valor en la base de datos.');
    }
}

function validateLoginUser()
{
    $fields = ['email', 'password'];
    $rules = [
        'email' => 'required|valid_email|CustomValidations::validateEmail',
        'password' => 'required',
    ];

    return validate($fields, $rules, 'La contraseña es incorrecta.');
}

function validateCandidate()
{
    $fields = ['application', 'nip'];
    $rules = [
        'application' => 'required|CustomValidations::validateEmail',
        'nip' => 'required',
    ];

    return validate($fields, $rules, 'El NIP es incorrecto.');
}
