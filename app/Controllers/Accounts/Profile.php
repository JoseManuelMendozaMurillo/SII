<?php

namespace App\Controllers\Accounts;

use App\Controllers\BaseController;
use App\Entities\Aspirantes\Aspirante;
use App\Models\Aspirantes\AspiranteModel;
use App\Models\ServiciosEscolares\CarrerasModel;
use Exception;

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
        $carrera = new CarrerasModel();
        $data = [
            'aspirante.foto' => config('Paths')->accessPhotosAspirantes . '/' . 'test.png',
            'fullName' => $user_data['nombre'] . ' '
                        . $user_data['apellido_paterno'] . ' '
                        . $user_data['apellido_materno'] . ' ',
            'position' => 'Puesto',
            'job' => 'Aspirante',
            'identifier' => '19630314', // No. de control para estudiantes, RFC para personal
            'department' => 'Carrera',

            'departmentassociated' => $carrera->getNameById($user_data['carrera_primera_opcion']), // Carrera o departamente asociado
            'email' => $this->user->getEmail(),
        ];
        // dd($data);

        $this->twig->display('Perfil/perfil', $data);
    }

    public function changePassword()
    {
        $oldPassword = $this->request->getPost('oldpassword');
        $newPassword = $this->request->getPost('newpassword');
        $newPassword2 = $this->request->getPost('newpassword2');
        $email = $this->user->getEmail();

        $credentials = [
            'email' => $email,
            'password' => $oldPassword,
        ];

        $validCreds = auth()->check($credentials);

        if (!$validCreds->isOK()) {
            return redirect()->back()->with('errors', 'Error de autenticacion: Contraseña incorrecta.');
        }

        if ($newPassword !== $newPassword2) {
            return redirect()->back()->with('errors', 'Las contraseñas ingresadas no coinciden.');
        }

        if ($newPassword == $oldPassword) {
            return redirect()->back()->with('errors', 'La nueva contraseña no puede ser igual a la anterior.');
        }

        $this->user->fill([
            'password' => $newPassword,
        ]);

        if (!$this->users->save($this->user)) {
            redirect()->back()->with('errors', 'No se pudo cambiar la contraseña.');
        } else {
            return redirect()->back()->with('success', 'Contraseña cambiada exitosamente.');
        }
    }
}
