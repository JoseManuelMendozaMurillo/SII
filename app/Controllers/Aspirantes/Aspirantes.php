<?php

namespace App\Controllers\Aspirantes;

use CodeIgniter\HTTP\Response;
use App\Entities\Aspirantes\Aspirante;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Controllers\RegisterController;
use CodeIgniter\HTTP\RedirectResponse;
use App\Models\ServiciosEscolares\CarrerasModel;
use App\Models\Aspirantes\AspiranteModel;
use App\Libraries\Files;
use App\Libraries\Emails;
use App\Libraries\ExportPdf;
use App\Models\RecursosFinancieros\InfoBancariaModel;
use Exception;

class Aspirantes extends RegisterController
{
    protected $aspirantesModel;
    protected $user;
    protected $userId;
    protected $bancoModel;
    protected $bancoData;
    protected $carrerasModel;
    protected $db;
    protected $pdf;
    protected $emails;
    private array $tables;
    private $aspirantesAux;

    public function __construct()
    {
        $this->aspirantesModel = new AspiranteModel();
        $this->user = user_id(); // Toma el usuario logeado del servicio de autenticacion
        $this->bancoModel = new InfoBancariaModel();
        $this->bancoData = $this->bancoModel->getData();
        $this->carrerasModel = new CarrerasModel();
        $this->pdf = new ExportPdf();
        $this->emails = new Emails();
        $this->tables = config('Auth')->tables;
        $this->db = db_connect();

        $this->aspirantesAux = new AspirantesAux(
            $this->aspirantesModel,
            $this->tables,
        );
    }

    // PARA VIEWS

    /**
     * index
     * Funcion para mostrar la pagina principal del modulo de aspirantes dentro de la plataforma
     *
     * @return void
     */
    public function index(): void
    {
        $user_data = $this->aspirantesModel->getDataForIndex($this->user);
        $data = [
            'fullName' => $user_data['fullname'],
            'noSolicitude' => $user_data['no_solicitud'],
            'pathPhoto' => $user_data['path_photo'],
            'referencia' => $user_data['reference'],
            'estatusPago' => $user_data['payment_status'],

            'banco' => $this->bancoData['banco'],
            'sucursal' => $this->bancoData['sucursal'],
            'cuenta' => $this->bancoData['cuenta'],
            'montoPagar' => $this->bancoData['costo_examen'] . '.00',

        ];

        if ($user_data['payment_status']) {
            $this->twig->display('Aspirantes/modulo_pagado', $data);

            return;
        }

        $this->twig->display('Aspirantes/modulo-aspirantes', $data);
    }

    /**
     * getFichaAspirante
     * Genera un PDF con los los datos de la ficha de solicitud del aspirante
     */
    public function getFichaAspirante()
    {
        $id = (string) $this->request->getPost('id');

        // $user = $this->aspirantesModel->findByUserId($id)->toArray();
        $user_data = $this->aspirantesModel->getDataForFicha($id);

        $carrera = new CarrerasModel();

        $data = [
            'fullName' => $user_data['fullname'],
            'curp' => $user_data['curp'],
            'noSolicitude' => $user_data['no_solicitud'],
            'nip' => $user_data['nip'],
            'firstOption' => $carrera->getNameById($user_data['first_option']),
            'pathPhoto' => $user_data['path_photo'],
        ];

        $template = 'Aspirantes/pdf_templates/pdf_aspirantes';
        $fileName = 'ficha_' . $user_data['no_solicitud'] . '.pdf';

        $pdfContent = $this->pdf->exportPdf($template, $data, $fileName);
        $message = 'Aspirant application PDF file generated {"user_id": "' . $id . '"}';
        log_message('info', $message);

        // Enviar la respuesta al cliente

        return $this->response->setStatusCode(200)
                              ->setBody($pdfContent)
                              ->setHeader('Content-Type', 'application/pdf')
                              ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
                              ->setHeader('Cache-Control', 'max-age=0');
    }

    /**
     * getReciboAspirante
     * Genera un PDF con los los datos del recibo del aspirante
     */
    public function getReciboAspirante()
    {
        $user_data = $this->aspirantesModel->getDataForRecibo($this->user);

        $data = [

            'banco' => $this->bancoData['banco'],
            'sucursal' => $this->bancoData['sucursal'],
            'cuenta' => $this->bancoData['cuenta'],
            'montoPagar' => '$' . $this->bancoData['costo_examen'] . '.00',

            'referencia' => $user_data['reference'],

        ];

        $template = 'Aspirantes/pdf_templates/pdf_recibo_pago';
        $fileName = 'recibo_' . $user_data['no_solicitud'] . '.pdf';

        $pdfContent = $this->pdf->exportPdf($template, $data, $fileName);

        $message = 'Aspirant bank record PDF file generated {"user_id": "' . $this->user . '"}';
        log_message('info', $message);

        // Enviar la respuesta al cliente
        return $this->response->setStatusCode(200)
                              ->setBody($pdfContent)
                              ->setHeader('Content-Type', 'application/pdf')
                              ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
                              ->setHeader('Cache-Control', 'max-age=0');
    }

    /**
     * getDatosASpirante
     * Manda datos a la vista de de aspirante
     */
    public function getDatosAspirante()
    {
        // PENDIENTE: Asignar el id por medio de post y mandar datos a la vista

        // $id = $this->request->getPost('id');
        $user_data = $this->aspirantesModel->getData($this->user);

        // $user = $this->aspirantesModel->find(1)->toArray();

        $banco = new InfoBancariaModel();
        $banco = $banco->getDataForIndex();
        $data = [
            'fullName' => $user_data['fullname'],
            'noSolicitude' => $user_data['no_solicitud'],
            'pathPhoto' => $user_data['path_photo'],
            'referencia' => $user_data['reference'],

            'banco' => $this->bancoData['banco'],
            'sucursal' => $this->bancoData['sucursal'],
            'cuenta' => $this->bancoData['cuenta'],
            'costo_examen' => $this->bancoData['costo_examen'],

        ];

        d($data);
    }

    public function pagadoModulo(): void
    {
        $esAcreditado = true; // Puedes cambiar esto según tu lógica\

        $this->twig->display('Aspirantes/modulo_pagado', [
            'esAcreditado' => $esAcreditado,
        ]);
    }

    // OPERACIONES EN DB

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
            $newNoSolicitude = $this->aspirantesAux->createNoSolicitude($lastNoSolicitude);

            // Generamos un nip para el nuevo registro
            $newNip = $this->aspirantesAux->createNip();

            // Creamos un usuario para el aspirante
            $user = $this->createUserAspirante($newNoSolicitude, $newNip);

            // Guardamos los datos del aspirante
            $dataAspirante = $this->insertDataAspirante($user, $newNoSolicitude, $newNip);

            // Enviamos el correo con la informacion de inicio sesion al aspirante
            // Obtención de datos para generar el correo
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
                    'carrera' => $this->carrerasModel->getNameById($idCarrera),
                    'anoIngreso' => date('Y'),
                ],
            ];

            // TODO: Convertir esto en libreria para poder reutilizarlo
            // Enviamos el correo

            $addressee = $dataAspirante['email'];
            $subject = '¡Felicidades por inscribirte al Tecnológico de Ocotlán!';
            $htmlEmail = $this->twig->render('Correos/email', $dataEmail);
            if (!$this->emails->sendHtmlEmail($addressee, $subject, $htmlEmail)) {
                $message = 'Aspirant registration email failed to be sent {"user_id": "' . $this->userId . '"}';
                log_message('error', $message);

                // TODO: Crear excepcion custom para correos
                throw new Exception('Ha ocurrido un error al intentar enviar el correo');
            }
            $message = 'Aspirant registration email sent successfully {"user_id": "' . $this->userId . '", "email": "' . $addressee . '"}';
            log_message('info', $message);

            // Si todo está bien, confirmar la transacción
            $this->db->transCommit();
            $message = 'Aspirant successfull registration in DB {"user_id": "' . $this->userId . '"}';
            log_message('info', $message);

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
                'carrera' => $this->carrerasModel->getNameById($idCarrera),
                'foto' => $pathPhoto,
                'idUser' => $user->id,
            ];

            $this->twig->display('Aspirantes/finalizacion-aspirantes', $data);
        } catch (Exception $e) {
            // Si hay un error se realizara un rollback
            $this->db->transRollback();
            $message = 'Aspirant unsuccessful registration in DB, rolling back {"user_id": "' . $this->user . '"}';
            log_message('error', $message);

            // Eliminar las fotos del aspirante si no se termino el proceso
            if (isset($user)) {
                $dirPhotosAspirantes = config('Paths')->photoAspiranteDirectory . '/' . $user->id;
                $files = new Files();
                $files->deleteDir($dirPhotosAspirantes);
                $message = 'Aspirant photo deletion because unsuccessfull registration {"user_id": "' . $this->user . '", "path": "' . $dirPhotosAspirantes . '"}';
                log_message('error', $message);
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
        $this->aspirantesModel->deleteAspirante($userId);
        $message = 'Aspirant deletion from DB {"user_id": "' . $userId . '"}';
        log_message('info', $message);
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
                $message = 'Aspirant payment status couldnt be changed {"user_id": "' . $idAspirante . '", "payment_status": "' . $status . '"}';
                log_message('error', $message);
            }
            $message = 'Aspirant payment status changed {"user_id": "' . $idAspirante . '", "payment_status": "' . $status . '"}';
            log_message('info', $message);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
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
        $users = $this->aspirantesAux->getUserProvider();

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
        $rules = $this->aspirantesAux->getValidationRules();

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
            $this->userId = $users->getInsertID();
            $message = 'New user for aspirant created successfully {"user_id": "' . $this->userId . '"}';
            log_message('info', $message);
        } catch (ValidationException $e) {
            $errors = $users->errors();
            $message = 'User couldnt be created {"error": "' . $errors . '"}';
            log_message('error', $message);

            throw new Exception($errors[array_key_first($errors)]);
        }

        // Para obtener el objeto de usuario completo con ID, necesitamos obtenerlo de la base de datos
        $user = $users->findById($users->getInsertID());

        // Agregamos al nuevo usuario al grupo aspirantes
        $user->addGroup('aspirante');
        $message = 'User added to "aspirantes" group {"user_id": "' . $user->id . '"}';
        log_message('info', $message);

        // Activamos el nuevo usuario
        $user->activate();
        $message = 'User activated {"user_id": "' . $user->id . '"}';
        log_message('info', $message);

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
        $namePhoto = $this->aspirantesAux->createThumbPhotoAspirante($user->id, $this->request->getFile('foto'));

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
            $message = 'User data couldnt be saved {"user_id": "' . $user->id . '"}';
            log_message('error', $message);

            throw new Exception('Hubo un error al intentar guardar los datos del aspirante en la base de datos');
        }

        $message = 'User data saved successfully {"user_id": "' . $user->id . '"}';
        log_message('error', $message);

        return $data;
    }

    // UTILIDADES DEL CONTROLLER
}
