<?php

namespace App\Controllers\Aspirantes;

use CodeIgniter\Events\Events;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Controllers\RegisterController;
use App\Models\ServiciosEscolares\CarrerasModel;

class Aspirantes extends RegisterController
{
    /**
     * aspirantes
     * Funcion para mostrar el formulario de registro de los aspirantes
     *
     * @return void
     */
    public function aspirantes(): void
    {
        // Conexión a la base de datos
        $db = db_connect();
        // Models
        $carrerasModel = new CarrerasModel();

        $data = [
            // Catalogos de datos
            'tiposSangre' => $db->table('tipos_sangre')->get()->getResultArray(),
            'comunidadesIndigenas' => $db->table('comunidades_indigenas')->get()->getResultArray(),
            'lenguasIndigenas' => $db->table('lenguas_indigenas')->get()->getResultArray(),
            'carreras' => $carrerasModel->select('id_carrera, nombre_carrera')->findAll(),
            'motivosIngreso' => $db->table('motivos_ingreso')->get()->getResultArray(),
            'nivelesEstudio' => $db->table('nivel_estudios')->get()->getResultArray(),
            'cohabitantes' => $db->table('cohabitantes')->get()->getResultArray(),
            'ocupaciones' => $db->table('ocupaciones')->get()->getResultArray(),
            'propiedadVivienda' => $db->table('propiedad_vivienda')->get()->getResultArray(),
            'tipoPiso' => $db->table('tipos_piso')->get()->getResultArray(),
        ];

        $this->twig->display('Aspirantes/aspirantes', $data);
    }

    public function hello()
    {
        echo 'Hola, aspirante';
    }

    public function new()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->registerRedirect());
        }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            dd('No esta activo el registro de cuentas');

            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Obtener datos necesarios del formulario de aspirantes
        // Si se necesitara un nuevo modelo, para validar el formato del nip y el no. solicitud
        $dataAspirante = [
            'username' => 'wedin',
            'email' => '19630306@itocotlan.com', // Debe ser el nip
            'password' => 'sii@correcaminos123', // Debe ser el numero de solicitud
            'password_confirm' => 'sii@correcaminos123',
        ];

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (!$this->validateData($dataAspirante, $rules, [], config('Auth')->DBGroup)) {
            d('No paso las validaciones');
            dd($this->validator->getErrors());

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_keys($rules);
        $user = $this->getUserEntity();
        $user->fill($dataAspirante);

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            dd('Error la crear el usuario');

            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Agregamos al nuevo aspirante al grupo aspirantes
        $user->addGroup('aspirante');

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->startLogin($user);

        // If an action has been defined for register, start it up.
        $hasAction = $authenticator->startUpAction('register', $user);
        if ($hasAction) {
            return redirect()->to('auth/a/show');
        }

        // Set the user active
        $user->activate();

        $authenticator->completeLogin($user);

        // Success! (Redireccionar al login)
        // return redirect()->to(config('Auth')->registerRedirect())
        //     ->with('message', lang('Auth.registerSuccess'));
        d('Nuevo aspirante creado');
    }

    public function deleteAspirante($id)
    {
        $users = auth()->getProvider();

        //Borrar el aspirante de la BD
        if ($users->delete($id, true)) {
            dd('Aspirante eliminado');
        } else {
            dd('Error al eliminar el aspirante');
        }
    }

    // Sobrescribir los metodos getUserProvider(), getUserEntity() y getValidationRules()
    public function aspirantesModulo()
    {
        $this->twig->display('Aspirantes/modulo-aspirantes');
    }
}
