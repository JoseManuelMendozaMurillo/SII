<?php

function validateLogin()
{
    $validation = service('validation');

    $validation->setRules([
        'email' => 'required|valid_email|is_unique[alumnos.email]',
        'password' => 'required|is_unique[alumnos.password]',
    ]);
}

function validateSingup()
{
    $validation = service('validation');

    $validation->setRules([
        'name' => 'required|alpha_space',
        'email' => 'required|valid_email',
        'password' => 'required|min_length[8]',

        'confirmPassword' => '<PASSWORD>|matches[password]',

        'curp' => 'required|alpha_numeric',
        'nameInfo' => 'required|alpha_space',
        'surnamePaterno' => 'required|alpha_space',
        'surnameMaterno' => 'required|alpha_space',
        'birthdate' => 'required',
        'gender' => 'required',

        'phone1' => 'required|numeric',

        'street' => 'required',
        'suburb' => 'required',
        'outN' => 'required|numeric',
        'zipcode' => 'required|numeric',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',

    ]);
}
