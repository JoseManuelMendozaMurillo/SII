<?php

namespace App\Controllers\Aspirantes;

use App\Database\Migrations\InformacionBancaria;
use CodeIgniter\HTTP\Response;
use App\Entities\Aspirantes\Aspirante;
use CodeIgniter\Shield\Entities\User;
use App\Models\Aspirantes\UserModelAspirantes;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Controllers\RegisterController;
use CodeIgniter\HTTP\RedirectResponse;
use App\Models\ServiciosEscolares\CarrerasModel;
use App\Models\Aspirantes\AspiranteModel;
use App\Libraries\Files;
use App\Libraries\Thumbs;
use App\Libraries\Emails;
use App\Models\RecursosFinancieros\InfoBancariaModel;
use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

class Aspirantes extends RegisterController
{
    protected $aspirantesModel;
    protected $db;
    private array $tables;

    public function __construct()
    {
        $this->aspirantesModel = new AspiranteModel();
        $this->tables = config('Auth')->tables;
        $this->db = db_connect();
    }

    /**
     * index
     * Funcion para mostrar la pagina principal del modulo de aspirantes dentro de la plataforma
     *
     * @return void
     */
    public function index(): void
    {
        $banco = new InfoBancariaModel();
        $user = $this->aspirantesModel->find(user_id())->toArray();
        // dd($user);

        $banco = new InfoBancariaModel();
        $banco = $banco->getData();

        $date = $user['fecha_nacimiento'];
        $date_aux = substr($date, 2, 2) . substr($date, 5, 2) . substr($date, 8, 2);
        $referencia = 'ITOCO'
        . $user['no_solicitud']
        . $user['apellido_paterno']
        . $user['nombre']
        . $date_aux;
        $referencia = strtoupper($referencia);
        $data = [
            'fullName' => $user['nombre'] . ' '
                        . $user['apellido_paterno'] . ' '
                        . $user['apellido_materno'],

            'noSolicitude' => $user['no_solicitud'],
            'pathPhoto' => config('Paths')->accessPhotosAspirantes . '/' . 'test.png',

            'banco' => $banco['banco'],
            'sucursal' => $banco['sucursal'],
            'cuenta' => $banco['cuenta'],

            'montoPagar' => $banco['costo_examen'] . '.00',

            'referencia' => $referencia,
            'esAcreditado' => false, //$user['estatus_pago'],

        ];

        // dd($data);

        $this->twig->display('Aspirantes/modulo-aspirantes', $data);
    }

    /**
     * formRegister
     * Funcion para mostrar el formulario de registro de los aspirantes
     *
     * @return ?RedirectResponse -> redirige a un modulo dependiendo de los permiso de la sesion
     *                           -> si no hay una sesion, muestra el formulario de registro
     */
    public function formRegister(): ?RedirectResponse
    {
        // Si hay una sesion activa, se redirige a un modulo dependiendo de los permisos de la sesion
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect())->withCookies();
        }

        // Verificamos que sea tiempo de inscripciones (Hace falta ajustar este fragmento de código)
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        // Models
        $carrerasModel = new CarrerasModel();

        $data = [
            // Catalogos de datos
            'estadoCivil' => $this->db->table('estado_civil')->get()->getResultArray(),
            'tiposSangre' => $this->db->table('tipos_sangre')->get()->getResultArray(),
            'comunidadesIndigenas' => $this->db->table('comunidades_indigenas')->get()->getResultArray(),
            'lenguasIndigenas' => $this->db->table('lenguas_indigenas')->get()->getResultArray(),
            'carreras' => $carrerasModel->select('id_carrera, nombre_carrera')->findAll(),
            'motivosIngreso' => $this->db->table('motivos_ingreso')->get()->getResultArray(),
            'nivelesEstudio' => $this->db->table('nivel_estudios')->get()->getResultArray(),
            'cohabitantes' => $this->db->table('cohabitantes')->get()->getResultArray(),
            'ocupaciones' => $this->db->table('ocupaciones')->get()->getResultArray(),
            'propiedadVivienda' => $this->db->table('propiedad_vivienda')->get()->getResultArray(),
            'tipoPiso' => $this->db->table('tipos_piso')->get()->getResultArray(),
            'estadoCivil' => $this->db->table('estado_civil')->get()->getResultArray(),
        ];

        return $this->twig->display('Aspirantes/FormRegister/form', $data);
    }

    /**
     * post
     * Funcion para guardar en la base de datos los datos de los aspirantes
     *
     */
    public function post()
    {
        // Validamos el formulario
        $dataAspirante = $this->request->getPost();
        if (!$this->validation->run($dataAspirante, 'registerFormAspirantes')) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // Iniciamos una transaccion para crear el nuevo registro
        $this->db->transStart();

        try {
            // Generamos un número de solicutud para el nuevo registro
            $lastNoSolicitude = $this->aspirantesModel->getLastNoSolicutude();
            $newNoSolicitude = $this->createNoSolicitude($lastNoSolicitude);

            // Generamos un nip para el nuevo registro
            $newNip = $this->createNip();

            // Creamos un usuario para el aspirante
            $user = $this->createUserAspirante($newNoSolicitude, $newNip);

            // Guardamos los datos del aspirante
            $dataAspirante = $this->insertDataAspirante($user, $newNoSolicitude, $newNip);

            // Enviamos el correo con la informacion de inicio sesion al aspirante
            // Obtención de datos para generar el correo
            $carrerasModel = new CarrerasModel();
            $idCarrera = $dataAspirante['carrera_primera_opcion'];
            $pathPhoto = config('Paths')->accessPhotosAspirantes . '/' . $user->id . '/' . $dataAspirante['imagen'];
            $dataEmail = [
                'aspirante' => [
                    'nombre' => $dataAspirante['nombre'],
                    'apellidoPaterno' => $dataAspirante['apellido_paterno'],
                    'apellidoMaterno' => $dataAspirante['apellido_materno'],
                    'noSolicitude' => $newNoSolicitude,
                    'nip' => $newNip,
                    'foto' => $pathPhoto,
                    'carrera' => $carrerasModel->getNameById($idCarrera),
                    'anoIngreso' => date('Y'),
                ],
            ];
            // Enviamos el correo
            $emails = new Emails();
            $addressee = $dataAspirante['email'];
            $subject = '¡Felicidades por inscribirte al Tecnológico de Ocotlán!';
            $htmlEmail = $this->twig->render('Correos/email', $dataEmail);
            if (!$emails->sendHtmlEmail($addressee, $subject, $htmlEmail)) {
                throw new Exception('Ha ocurrido un error al intentar enviar el correo');
            }

            // Si todo está bien, confirmar la transacción
            $this->db->transCommit();

            // Mostramos la vista de exito
            $nombre = implode(
                ' ',
                [
                    $dataAspirante['nombre'],
                    $dataAspirante['apellido_paterno'],
                    $dataAspirante['apellido_materno'],
                ]
            );
            $pathPhoto = config('Paths')->accessPhotosAspirantes . '/' . $user->id .
                                            '/thumbs//' . $dataAspirante['imagen'];
            $data = [
                'nombre' => $nombre,
                'curp' => $dataAspirante['curp'],
                'carrera' => $carrerasModel->getNameById($idCarrera),
                'foto' => $pathPhoto,
                'idUser' => $user->id,
            ];

            $this->twig->display('Aspirantes/finalizacion-aspirantes', $data);
        } catch (Exception $e) {
            // Si hay un error se realizara un rollback
            $this->db->transRollback();

            // Eliminar las fotos del aspirante si no se termino el proceso
            if (isset($user)) {
                $dirPhotosAspirantes = config('Paths')->photoAspiranteDirectory . '/' . $user->id;
                $files = new Files();
                $files->deleteDir($dirPhotosAspirantes);
            }

            $this->twig->display('errors/error500');
        }
    }

    /**
     * delete
     * Función para eliminar de manera lógica a un aspirante
     *
     * @param string $userId -> Id de usuario del aspirante a eliminar
     *
     * @return void
     */
    public function delete(string $userId): void
    {
        // Iniciamos una transacción
        $this->db->transStart();

        try {
            $users = auth()->getProvider();

            //Borrar el aspirante de la BD
            $aspirante = $this->aspirantesModel->where('user_id', $userId)->first();
            $this->aspirantesModel->delete($aspirante->id_aspirante);

            if (!$users->delete($userId)) {
                throw new Exception('Hubo un error al intentar eliminar al aspirante de las tablas de usuarios');
            }

            // Si todo salio bien, confirmamos la transacción
            $this->db->transCommit();

            // Retornamos vista de exito
            d('Aspirante eliminado');
        } catch (Exception $e) {
            // Hacemos un rollback para no romper la integridad de los datos
            $this->db->transRollback();

            // Mostrar la vista de error en el back
            dd('Error: ' . $e->getMessage());
        }
    }

    /**
     * changeStatusPayment
     * Función AJAX para cambiar el estatus del pago de un aspirante mendiante su id, el estatus del pago
     * cambia a pagado (true) por defecto, pero si se configura el parametro $status en false, el status
     * de pago del aspirante cambia a pago pendiente (false)
     *
     * @param string $idAspirante -> Id del aspirante a actualizar
     * @param bool   $status      -> Nuevo estatus de pago del aspirante (true -> pagado, false -> pago pendiente).
     *                            Por defecto es true
     *
     * @throws Exception -> Se lanza si los parametros no pasan la validación
     *                   -> Se lanza si la petición post no es de tipo AJAX
     *                   -> Se lanza si hay un error al intentar actualizar el estatus de pago
     *
     * @return Response -> Respuesta de la peticion AJAX
     */
    public function changeStatusPayment(): Response
    {
        // Nos aseguramos de solo recibir peticiones ajax
        if (!$this->request->isAJAX()) {
            throw new Exception('No se encontró el recurso', 404);
        }

        try {
            // Validacion de datos
            $data = $this->request->getPost();
            if (!$this->validation->run($data, 'rulesChageStatusPaymentAspirante')) {
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            // Obtenemos los datos para actualizar el estatus de pago
            $idAspirante = (string) $this->request->getPost('idAspirante');
            $status = $this->request->getPost('status') != null
                                            ? filter_var($this->request->getPost('status'), FILTER_VALIDATE_BOOLEAN)
                                            : true;

            // Actualizamos el estatus de pago
            if (!$this->aspirantesModel->changeStatusPayment($idAspirante, $status)) {
                // Si el registro no se actualizo, lanzamos una excepcion
                throw new Exception('El registro no se pudo actualizar', 500);
            }

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
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
    private function createNoSolicitude(string $lastNoSolicitude): string
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
    private function createNip(): string
    {
        // Crear un arreglo con los números del 0 al 9
        $nums = range(0, 9);

        // Obtener una lista con todos los nips
        $listNips = $this->aspirantesModel->getListNips();

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
     * createUserAspirante
     * Funcion para crear y registrar el usuario del nuevo aspirante para que pueda iniciar sesion
     *
     * @param string $noSolicitude -> Número de solicitud para el nuevo usuario aspirante
     * @param string $nip          -> Nip para el nuevo usuario aspirante
     *
     * @throws Exception -> Se lanza si los datos no pasaron la validación
     *
     * @return User
     */
    private function createUserAspirante(string $noSolicitude, string $nip): User
    {
        $users = $this->getUserProvider();

        // Obtener datos necesarios para crear al usuario como aspirante
        $name = $this->request->getPost('nombre');
        $surnamePaterno = $this->request->getPost('apellidoPaterno');
        $surnameMaterno = $this->request->getPost('apellidoMaterno');
        $dataAspirante = [
            'name' => $name . ' ' . $surnamePaterno . ' ' . $surnameMaterno,
            'username' => str_replace(' ', '', $name) . '_' . $noSolicitude,
            'email' => $noSolicitude, // número de solicitud
            'password' => $nip, // nip
            'password_confirm' => $nip, // confirmar nip
        ];

        // Obtenemos las reglas de validacion
        $rules = $this->getValidationRules();

        // Si los datos no pasan la validación salta una excepción
        if (!$this->validateData($dataAspirante, $rules, [], config('Auth')->DBGroup)) {
            $errors = $this->validator->getErrors();

            throw new Exception($errors[array_key_first($errors)]);
        }

        // Registramos el nuevo usuario para el aspirante
        $user = $this->getUserEntity();
        $user->fill($dataAspirante);

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            $errors = $users->errors();

            throw new Exception($errors[array_key_first($errors)]);
        }

        // Para obtener el objeto de usuario completo con ID, necesitamos obtenerlo de la base de datos
        $user = $users->findById($users->getInsertID());

        // Agregamos al nuevo usuario al grupo aspirantes
        $user->addGroup('aspirante');

        // Activamos el nuevo usuario
        $user->activate();

        return $user;
    }

    /**
     * insertDataAspirante
     * Función para guardar los datos del aspirante en la base de datos
     *
     * @param User   $user         -> Entidad usuario del aspirante para iniciar sesion (Entidad del shield)
     * @param string $noSolicitude -> Número de solicitud del aspirante
     * @param string $nip          -> Nip del aspirante
     *
     * @throws Exception -> Se lanza si los datos no se guardaron en la BD
     *
     * @return array $data -> Datos del aspirante insertados en la base de datos
     */
    private function insertDataAspirante(User $user, string $noSolicitude, string $nip): array
    {
        $namePhoto = $this->createThumbPhotoAspirante($user->id);

        // Creamos el arreglo de datos con la información del aspirante que se insertara
        $data = [
            // Tabla principal
            'user_id' => $user->id,
            'no_solicitud' => $noSolicitude,
            'nip' => $nip,
            'imagen' => $namePhoto,
            'curp' => $this->request->getPost('curp'),
            'apellido_paterno' => $this->request->getPost('apellidoPaterno'),
            'apellido_materno' => $this->request->getPost('apellidoMaterno'),
            'nombre' => $this->request->getPost('nombre'),
            'fecha_nacimiento' => $this->request->getPost('fechaNacimiento'),
            'genero' => $this->request->getPost('genero'),
            'estado_civil' => $this->request->getPost('estadoCivil'),
            'pais_nacimiento' => $this->request->getPost('paisNacimiento'),
            'telefono' => $this->request->getPost('tel'),
            'email' => $this->request->getPost('correo'),
            'escuela_procedencia' => $this->request->getPost('nombreEscuela'),
            'estado_escuela' => $this->request->getPost('estadoEscuela'),
            'municipio_escuela' => $this->request->getPost('municipioEscuela'),
            'ano_egreso' => $this->request->getPost('anoEgreso'),
            'promedio_general' => $this->request->getPost('promedio'),
            'carrera_primera_opcion' => $this->request->getPost('primeraOpcionIngreso'),
            'carrera_segunda_opcion' => $this->request->getPost('segundaOpcionIngreso'),
            'turno_preferente' => $this->request->getPost('turno'),
            'ito_primer_opcion' => $this->request->getPost('primeraOpcion'),
            'motivo_ingreso' => $this->request->getPost('motivoIngreso'),
            'motivo_seleccion_plan_estudios' => $this->request->getPost('motivoSeleccionPlanEstudio'),
            // Tabla de datos complementarios
            'calle_domicilio' => $this->request->getPost('calle'),
            'no_exterior' => $this->request->getPost('numExterior'),
            'no_interior' => $this->request->getPost('numInterior'),
            'letra_exterior' => $this->request->getPost('letraExterior'),
            'letra_interior' => $this->request->getPost('letraInterior'),
            'colonia' => $this->request->getPost('colonia'),
            'estado' => $this->request->getPost('estadoResidencia'),
            'municipio' => $this->request->getPost('municipioResidencia'),
            'codigo_postal' => $this->request->getPost('cp'),
            'entre_calles' => $this->request->getPost('entreCalles'),
            'tutor' => $this->request->getPost('nombreTutor'),
            'estado_procedencia' => $this->request->getPost('estadoProcedencia'),
            'comunidad_indigena' => $this->request->getPost('comunidadIndigena'),
            'tipo_sangre' => $this->request->getPost('tipoSangre'),
            'discapacidad' => $this->request->getPost('discapacidad'),
            'lengua_indigena' => $this->request->getPost('lenguaIndigena'),
            'telefono_contacto' => $this->request->getPost('telTutor'), // Revisar el nombre de este campo
            'nivel_estudio_padre' => $this->request->getPost('nivelEstudioPadre'),
            'nivel_estudio_madre' => $this->request->getPost('nivelEstudioMadre'),
            'vives_actualmente' => $this->request->getPost('cohabitantes'),
            'ocupacion_padre' => $this->request->getPost('ocupacionPadre'),
            'ocupacion_madre' => $this->request->getPost('ocupacionMadre'),
            'casa_resides' => $this->request->getPost('propiedadCasa'),
            'no_cuartos' => $this->request->getPost('cantidadCuartos'),
            'no_miembros' => $this->request->getPost('cantidadCohabitantes'),
            'regadera' => $this->request->getPost('regaderas'),
            'no_banos' => $this->request->getPost('cantidadBanos'),
            'no_focos' => $this->request->getPost('cantidadFocos'),
            'tipo_piso' => $this->request->getPost('tipoPiso'),
            'no_automoviles' => $this->request->getPost('cantidadAutos'),
            'estufa' => $this->request->getPost('estufa') == 'S' ? 1 : 0,
        ];

        $aspirante = new Aspirante($data);

        if (!$this->aspirantesModel->save($aspirante)) {
            throw new Exception('Hubo un error al intentar guardar los datos del aspirante en la base de datos');
        }

        return $data;
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
    private function createThumbPhotoAspirante(string $userId): string
    {
        // Obtenemos el archivo
        $photoAspirante = $this->request->getFile('foto');

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
     * Returns the User provider
     */
    protected function getUserProvider(): UserModelAspirantes
    {
        $provider = new UserModelAspirantes();

        assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

        return $provider;
    }

    /**
     * getValidationRules
     * Función que devuelve un array con una lista de reglas para validar los datos para crear el nuevo usuario del
     * aspirante
     *
     * @return array<string, array<string, array<string>|string>>
     */
    protected function getValidationRules(): array
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

    public function pagadoModulo(): void
    {
        $esAcreditado = true; // Puedes cambiar esto según tu lógica\

        $this->twig->display('Aspirantes/modulo_pagado', [
            'esAcreditado' => $esAcreditado,
        ]);
    }

    /**
     * exportPdf
     * Función para exportar documentos HTML a PDF
     *
     * @return Response
     */
    public function exportPdf($template, $data, $fileName)
    {
        $options = new Options();
        $options->setChroot(FCPATH);
        $options->setDefaultFont('Inter');
        $options->setIsRemoteEnabled(true);

        $html = $this->twig->render($template, $data);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfContent = $dompdf->output();

        // Enviar la respuesta al cliente
        return $this->response->setStatusCode(200)
                              ->setBody($pdfContent)
                              ->setHeader('Content-Type', 'application/pdf')
                              ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
                              ->setHeader('Cache-Control', 'max-age=0');
    }

    /**
     * getFichaAspirante
     * Genera un PDF con los los datos de la ficha de solicitud del aspirante
     */
    public function getFichaAspirante()
    {
        $id = (string) $this->request->getPost('id');

        $user = $this->aspirantesModel->findByUserId($id)->toArray();
        $carrera = new CarrerasModel();

        $data = [
            'fullName' => $user['nombre'] . ' '
                        . $user['apellido_paterno'] . ' '
                        . $user['apellido_materno'],
            'curp' => $user['curp'],
            'noSolicitude' => $user['no_solicitud'],
            'nip' => $user['nip'],
            'firstOption' => $carrera->getNameById($user['carrera_primera_opcion']),
            'pathPhoto' => config('Paths')->accessPhotosAspirantes . '/' . $user['user_id'] .
                           '/' . $user['imagen'],
        ];

        $template = 'Aspirantes/pdf_templates/pdf_aspirantes';
        $fileName = 'ficha_' . $user['no_solicitud'] . '.pdf';

        return $this->exportPdf($template, $data, $fileName);
    }

    public function getReciboAspirante()
    {
        $banco = new InfoBancariaModel();
        $user = $this->aspirantesModel->find(user_id())->toArray();
        // dd($user);

        $banco = new InfoBancariaModel();
        $banco = $banco->getData();

        $date = $user['fecha_nacimiento'];
        $date_aux = substr($date, 2, 2) . substr($date, 5, 2) . substr($date, 8, 2);
        $referencia = 'ITOCO'
        . $user['no_solicitud']
        . $user['apellido_paterno']
        . $user['nombre']
        . $date_aux;
        $referencia = strtoupper($referencia);
        $data = [

            'banco' => $banco['banco'],
            'sucursal' => $banco['sucursal'],
            'cuenta' => $banco['cuenta'],

            'montoPagar' => '$' . $banco['costo_examen'] . '.00',

            'referencia' => $referencia,

        ];

        $template = 'Aspirantes/pdf_templates/pdf_recibo_pago';
        $fileName = 'recibo_' . $user['no_solicitud'] . '.pdf';

        return $this->exportPdf($template, $data, $fileName);
    }

    /**
     * getDatosASpirante
     * Manda datos a la vista de de aspirante
     */
    public function getDatosAspirante()
    {
        // PENDIENTE: Asignar el id por medio de post y mandar datos a la vista

        // $id = $this->request->getPost('id');
        $user = $this->aspirantesModel->find(1)->toArray();

        $banco = new InfoBancariaModel();
        $banco = $banco->getData();

        $date = $user['fecha_nacimiento'];
        $date_aux = substr($date, 2, 2) . substr($date, 5, 2) . substr($date, 8, 2);
        $data = [
            'fullName' => $user['nombre'] . ' '
                        . $user['apellido_paterno'] . ' '
                        . $user['apellido_materno'],

            'noSolicitude' => $user['no_solicitud'],
            'pathPhoto' => config('Paths')->accessPhotosAspirantes . '/' . 'test.png',

            'banco' => $banco['banco'],
            'sucursal' => $banco['sucursal'],
            'cuenta' => $banco['cuenta'],

            'costo_examen' => $banco['costo_examen'],

            'referencia' => 'ITOCO'
                            . $user['no_solicitud']
                            . $user['apellido_paterno']
                            . $user['nombre']
                            . $date_aux,

        ];

        d($data);
    }
}
