<?php

namespace App\Controllers\Test;

use App\Controllers\BaseController;
use App\Libraries\Emails;
use App\Libraries\Thumbs;
use CodeIgniter\Shield\Entities\User;

class Pruebas extends BaseController
{
    public function img()
    {
        $this->twig->display('Test/PruebaImg');
    }

    public function admin()
    {
        $this->twig->display('Admin/principal_admin');
    }

    public function thumb()
    {
        // Obtenemos el archivo
        $img = $this->request->getFile('img');

        // Verificamos que el archivo sea valido
        if (!$img->isValid()) {
            echo 'El archivo no es valido';

            return;
        }

        // Obtenemos información de la imagen
        $path_img = $img->getTempName();
        $type_img = $img->getExtension();
        $name_img = uniqid('prueba_');

        // Creamos el thumb y guardamos la imagen
        $dir_img = FCPATH . 'uploads/';
        $thumbs = new Thumbs($dir_img);
        if (!$thumbs->createThumbs($path_img, $name_img, $type_img)) {
            echo 'Error al crear la imagen';

            return;
        }

        echo 'Thumb creado';
    }

    public function correo()
    {
        $this->twig->display('Test/PruebasCorreo');
    }

    public function sendEmail()
    {
        // Obtenemos la instancia de la solicitud (request)
        $request = service('request');

        // Obtenemos el valor del campo 'correo' que se envió en la solicitud POST
        $email = $request->getPost('correo');

        // Creamos una instancia de la librería que creamos para enviar correos
        $emails = new Emails();

        // Renderizamos el html y lo guardamos en la variable message
        $context = ['email' => $email];
        $message = $this->twig->render('Correos/Test', $context);

        // Enviamos el correo de activación (test)
        $send = $emails->sendHtmlEmail($email, 'Prueba', $message);

        // Enviamos el correo de activación (real)
        // $send = $emails->sendHtmlEmailFromBrevo('Jose Manuel', $email, 'Prueba', $message);

        // Sí el correo no se envio
        if (!$send) {
            echo 'Error al enviar el correo electrónico:';
            echo '<pre>';
            //echo $this->emails->print_debugger(['headers']);
            echo '</pre>';
        } else {
            echo 'Correo enviado';
        }
    }

    public function curl()
    {
        $this->twig->display('Test/PruebasCurl');
    }

    public function getDataPokemon()
    {
        // Conectamos a la poque api para verificar que curl este funcionando
        $pokemonName = $this->request->getPost('pokemonName');

        $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokemonName;

        // Inicializamos y configuramos curl
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Ejecutamos la consulta a la poke api
        $response = curl_exec($ch);

        // Obtenemos el estado de la consulta (Http code)
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Cerramos la sesión
        curl_close($ch);

        if ($httpCode >= 200 && $httpCode < 300) {
            $pokemonInfo = json_decode($response, true);
            $context = [
                'id' => $pokemonInfo['id'],
                'name' => $pokemonInfo['name'],
                'experience' => $pokemonInfo['base_experience'],
                'life' => $pokemonInfo['stats'][0]['base_stat'],
                'attack' => $pokemonInfo['stats'][1]['base_stat'],
                'defense' => $pokemonInfo['stats'][2]['base_stat'],
                'specialAttack' => $pokemonInfo['stats'][3]['base_stat'],
                'images' => [
                    'front' => $pokemonInfo['sprites']['front_default'],
                    'back' => $pokemonInfo['sprites']['back_default'],
                ],
                'alert' => [
                    'type' => 'success',
                    'text' => 'Pokemon encontrado',
                ],
            ];
        } else {
            $context = [
                'alert' => [
                    'type' => 'danger',
                    'text' => 'No se pudo obtener la informacion del pokemon',
                ],
            ];
        }
        $this->twig->display('Test/PruebasCurl', $context);
    }

    // PODEROSISIMO ADMINDEX
    public function admindex()
    {
        $data = [
            'loggedIn' => 'No loggeado',
            'user' => 'No user',
            'permissions' => [],
            'groups' => [],
        ];

        if (auth()->loggedIn()) {
            // Do something.
            $data = [
                'loggedIn' => 'Loggeado',
                'user' => user_id(),
                'email' => auth()->user()->getEmail(),
                'permissions' => auth()->user()->getPermissions(),
                'groups' => auth()->user()->getGroups(),
            ];
        }

        return view('Test/admindex', $data);
    }

    // SUPERDAMIN
    public function superadmin()
    {
        if (auth()->loggedIn()) {
            $user = auth()->user();
            $user->addGroup('superadmin');

            return redirect()->to('pruebas/admindex');
        }
        d('No estas logueado, pa');
    }

    public function login($username)
    {
        $credentials = [
            'email' => $username,
            'password' => '1234',
        ];

        if (auth()->loggedIn()) {
            auth()->logout();
        }

        $loginAttempt = auth()->attempt($credentials);

        if (!$loginAttempt->isOK()) {
            return redirect()->back()->with('error', $loginAttempt->reason());
        }

        return redirect()->to('pruebas/admindex');
    }

    public function newuser($username)
    {
        $users = auth()->getProvider();

        $user = new User([
            'username' => $username,
            'email' => $username . '@example.com',
            'password' => '1234qwer',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $users->addToDefaultGroup($user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->startLogin($user);
        $user->activate();

        $authenticator->completeLogin($user);

        d('Nuevo usuario creado');
    }

    public function deleteuser($username)
    {
        $users = auth()->getProvider();

        $user = $users->findByCredentials(['username' => $username]);

        if ($users->delete($user->id, true)) {
            d('Usuario eliminado con exito');
        } else {
            d('Error al eliminar usuario');
        }
    }

    public function allusers()
    {
        $users = auth()->getProvider();

        $user = $users->findByCredentials([]);
    }

    public function addgrouplogged($group)
    {
        if (!auth()->loggedIn()) {
            return redirect()->to('pruebas/admindex');
        }

        if (auth()->user()->addGroup($group)) {
            d('Usuario anadido al grupo exitosamente');
        } else {
            d('No se pudo anadir al grupo');
        }
    }

    public function addgroup($username, $group)
    {
        $users = auth()->getProvider();

        $user = $users->findByCredentials(['username' => $username]);

        if ($user->addGroup($group)) {
            d('Usuario anadido al grupo exitosamente');
        } else {
            d('No se pudo anadir al grupo');
        }
    }

    public function logout()
    {
        if (auth()->loggedIn()) {
            auth()->logout();
        }

        return redirect()->to('pruebas/admindex');
    }

    public function reticulas()
    {
        $this->twig->display('Test/Reticulas/reticulas');
    }

    public function correoAlumno()
    {
        $datos = [
            'nombre' => 'Cesar',
            'apellido_paterno' => 'God',
            'apellido_materno' => 'Cau',
            'correo_institucional' => 'correo',
            'password' => 'pass',
        ];

        $this->twig->display('Correos/correo_alumno', $datos);
    }
}
