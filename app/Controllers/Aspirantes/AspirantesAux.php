<?php

namespace App\Controllers\Aspirantes;

use Exception;
// use CodeIgniter\Shield\Entities\User;
use App\Libraries\Thumbs;
use App\Models\Aspirantes\UserModelAspirantes;
use CodeIgniter\Shield\Models\UserModel;

// Clase auxiliar para el controller de Aspirantes
// Funciones que no interactuan con la base de datos necesariamente, ahorramos espacion en
// el controller
class AspirantesAux
{
    private $model;
    private $validationRules;
    private $userProvider;
    private $tables;

    public function __construct($model, $tables)
    {
        $this->model = $model;
        $this->tables = $tables;
    }

    /**
     * createNoSolicitude
     * Funcion para crear un nuevo numero de solicitud
     *
     * @param string $lastNoSolicitude -> Ultimo numero de solicitud
     *
     * @throws Exception -> Se lanzan si $lastNoSolicitude no es un número
     *                   -> o si el nuevo número de solicitud excede el formato de 4 numeros
     *
     * @return string $newNoSolicitude -> Nuevo número de solicitud
     */
    public function createNoSolicitude(string $lastNoSolicitude): string
    {
        // Verificamos que la cadena sea un número
        if (!is_numeric($lastNoSolicitude)) {
            throw new Exception('El ultimo numero de solicitud no es un número');
        }

        // Convertirmos a int la cadena
        $lastNoSolicitude = (int) $lastNoSolicitude;

        // Creamos el nuevo número de solicitud
        $newNoSolicitude = $lastNoSolicitude + 1;

        // Verificamos que el nuevo numero de solicitud no exceda el formato de 4 números
        if ($newNoSolicitude > 9999) {
            throw new Exception('El nuevo número de solicutud excede el formato de 4 números');
        }

        // Le damos formato de 4 numeros al nuevo número de solicitud}
        $newNoSolicitude = str_pad($newNoSolicitude, 4, '0', STR_PAD_LEFT);

        // Hace falta asegurarse de que no el no solicitud sea unico
        return $newNoSolicitude;
    }

    /**
     * createNip
     * Funcion para crear un nuevo nip
     *
     * @return string $newNip -> Nuevo nip
     */
    public function createNip(): string
    {
        // Crear un arreglo con los números del 0 al 9
        $nums = range(0, 9);

        // Obtener una lista con todos los nips
        $listNips = $this->model->getListNips();

        do {
            // Barajar el arreglo
            shuffle($nums);

            // Obtenemos los indices desde los cuales se tomaran los numeros para el nuevo nip
            $index = rand(0, 6);

            // Crear el nip
            $newNip = implode(array_slice($nums, $index, 4));
        } while (in_array($newNip, $listNips));

        return $newNip;
    }

    /**
     * createThumbPhotoAspirante
     * Función para guardar la foto del aspirante y crear un thumb de ella
     *
     * @param string $userId -> Se utiliza como nombre de la carpeta donde estaran todas las fotos
     *
     * @throws Exception -> Se lanza si el archivo que subio el usuario como foto no es un archivo de imagen
     *                   -> Se lanza si hay un error al guardar la imagen o crear el thumb de esta
     *
     * @return string $fullNamePhoto -> Retorna el nombre de la foto junto con la extension de la imagen
     */
    public function createThumbPhotoAspirante(string $userId, $photoAspirante): string
    {
        // Obtenemos el archivo
        // $photoAspirante = $this->request->getFile('foto');

        // Verificamos que el archivo sea valido
        if (!$photoAspirante->isValid()) {
            throw new Exception('La foto del aspirante no tiene el formato valido');
        }

        // Obtenemos información de la imagen
        $pathPhoto = $photoAspirante->getTempName();
        $typePhoto = $photoAspirante->getExtension();
        $namePhoto = uniqid('FotoAspirante_');

        // Creamos el thumb y guardamos la imagen
        $dirImg = config('Paths')->photoAspiranteDirectory . '/' . $userId . '/';
        $thumbs = new Thumbs($dirImg);
        if (!$thumbs->createThumbs($pathPhoto, $namePhoto, $typePhoto, 200, 200, 200)) {
            throw new Exception('No se pudo crear el thumb para la foto del aspirante');
        }

        return $namePhoto . '.' . $typePhoto;
    }

    /**
     * getValidationRules
     * Función que devuelve un array con una lista de reglas para validar los datos para crear el nuevo usuario del
     * aspirante
     *
     * @return array<string, array<string, array<string>|string>>
     */
    public function getValidationRules(): array
    {
        $registrationUsernameRules = array_merge(
            config('AuthSession')->usernameValidationRules,
            [sprintf('is_unique[%s.username]', $this->tables['users'])]
        );
        $registrationNoSolicitude = array_merge(
            config('AuthSession')->noSolicitudeValidationRules,
            [sprintf('is_unique[%s.secret]', $this->tables['identities'])]
        );

        return setting('Validation.registration') ?? [
            'username' => [
                'label' => 'Auth.username',
                'rules' => $registrationUsernameRules,
                'errors' => [
                    'required' => 'El nombre de usuario es requerido',
                    'max_length' => 'El nombre de usuario no puede tener más de 30 caracteres',
                    'min_length' => 'El nombre de usuario no puede tener menos de 3 caracteres',
                    'regex_match' => 'El nombre de usuario contiene caracteres inválidos',
                    'is_unique' => 'El nombre de usuario ya está en uso',
                ],
            ],
            // Número de solicitud
            'email' => [
                'label' => 'Auth.noSolicitud',
                'rules' => $registrationNoSolicitude,
                'errors' => [
                    'required' => 'El número de solicitud es requerido',
                    'numeric' => 'El número de solicitud solo puede contener dígitos',
                    'exact_length' => 'El número de solicitud debe tener 4 dígitos',
                    'is_unique' => 'El número de solicitud ya está en uso',
                ],
            ],
            // Nip
            'password' => [
                'label' => 'Auth.nip',
                'rules' => 'required|exact_length[4]|numeric',
                'errors' => [
                    'max_byte' => 'Auth.errorPasswordTooLongBytes',
                    'required' => 'El nip es requerido',
                    'numeric' => 'El nip solo puede contener dígitos',
                    'exact_length' => 'El nip debe tener 4 dígitos',
                ],
            ],
            // Confirmar nip
            'password_confirm' => [
                'label' => 'Auth.nipConfirm',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Debe repetir el campo nip',
                    'matches' => 'El nip no coincide',
                ],
            ],
        ];
    }

    /**
    * Returns the User provider
    */
    public function getUserProvider(): UserModelAspirantes
    {
        $provider = new UserModelAspirantes();

        assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

        return $provider;
    }
}
