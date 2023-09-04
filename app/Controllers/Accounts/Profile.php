<?php

namespace App\Controllers\Accounts;

use App\Controllers\BaseController;
use App\Entities\Aspirantes\Aspirante;
use App\Models\Aspirantes\AspiranteModel;

class Profile extends BaseController
{
    protected $user;
    protected $users;
    protected $model;
    protected $db;
    private array $tables;

    public function __construct()
    {
        // TODO: CAMBIAR MODELO SEGUN USUARIO
        $this->user = auth()->user();
        $this->users = auth()->getProvider();
        $this->model = new AspiranteModel();
        $this->tables = config('Auth')->tables;
        $this->db = db_connect();
    }

    public function profile()
    {
        // Retorna resultado como un array de objetos, por lo cual accedemos al primero
        // y lo convertimos en array para poder trabajar con ellos
        // TODO: CAMBIAR EL 7 POR $this->user->id PARA OBTENER EL ID DEL USUARIO LEGGEADO
        $user_data = $this->model->where('user_id', 7)->find()[0]->toArray();
        $data = [
            'fullName' => $user_data['nombre'] . ' '
                        . $user_data['apellido_paterno'] . ' '
                        . $user_data['apellido_materno'] . ' ',
            'rol' => 'Estudiante',
            'identifier' => '19630314', // No. de control para estudiantes, RFC para personal
            'associated_to' => 'Ingenieria en Sistemas Compuacionales', // Carrera o departamente asociado

        ];

        d($data);
    }

    public function changePassword()
    {
        $newPassword = $this->request->getPost('newpassword');
        $this->user->fill([
            'password' => $newPassword,
        ]);
        if ($this->users->save($this->user)) {
            echo 'Exito';
        }

        echo 'Error';
    }
}
