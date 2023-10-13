<?php

namespace App\Controllers\Alumnos;

use App\Controllers\BaseController;
use App\Entities\Alumnos\Alumno;
use App\Models\Alumnos\AlumnoModel;
use App\Libraries\ControlNumber\ControlNumber;
use App\Libraries\InstitutionalEmail;
use App\Models\Aspirantes\AspiranteModel;
use App\Models\Aspirantes\ComplementaryDataModel;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Shield\Entities\User;
use App\Libraries\Emails;
use Exception;

// Alumnos controller

class Alumnos extends BaseController
{
    private $controlNumberGenerator;
    private $factory;
    private $passwordGenerator;
    private $institutionalEmailGenerator;
    private $alumnoModel;
    private $aspiranteModel;
    private $complementaryDataModel;
    private $emails;

    public function __construct()
    {
        $this->controlNumberGenerator = ControlNumber::getInstance();
        $this->factory = new \RandomLib\Factory();
        $this->passwordGenerator = $this->factory->getMediumStrengthGenerator();
        $this->institutionalEmailGenerator = new InstitutionalEmail();
        $this->alumnoModel = new AlumnoModel();
        $this->aspiranteModel = new AspiranteModel();
        $this->complementaryDataModel = new ComplementaryDataModel();

        $this->emails = new Emails();
    }

    public function alumno()
    {
        $this->newAlumnoFromAspirante();
    }

    public function newAlumnoFromAspirante()
    {
        // TODO: Cambiar la asignacion de $id_aspirante para ser recibida por el metodo por medio de post
        // TODO: Agrega mensaje personalizado para el correo de aceptacion

        // Recibe el user_id de un aspirante aceptado;
        $id_aspirante = 22;
        $aspirante = $this->aspiranteModel->where('id_aspirante', $id_aspirante)->find()[0];

        // Genera un no de control
        $no_control = $this->controlNumberGenerator->next();

        // Genera una contraseña
        $password = $this->passwordGenerator->generateString(8);

        // Genera un correo institucional

        $institutionalEmail = $this->institutionalEmailGenerator->getEmail($no_control);

        // Crea un nuevo usuario con los datos generados

        $alumno_user = $this->newuser($no_control, $institutionalEmail, $password);

        // Hace la migracion de datos de aspirante a alumno
        $aspirante_data = $aspirante->toArray();

        $aspirante_data['user_id'] = $alumno_user->id;
        $aspirante_data['no_control'] = $no_control;
        $this->alumnoModel->save($aspirante_data);

        // Hace la relacion en datos_complementarios
        $alumno = $this->alumnoModel->where('user_id', $alumno_user->id)->find()[0];

        $this->complementaryDataModel
        ->where('id_aspirante', $aspirante->id_aspirante)
        ->set(['id_alumno' => $alumno->id_alumno])
        ->update();

        // Genera un correo con los nuevos datos de ingreso
        // Manda el correo con los nuevos datos de ingreso
        $personal_email = $alumno->email;

        $addressee = $personal_email;
        $subject = 'ahora eres un alumno';
        $htmlEmail = '<h1>  user: ' . $institutionalEmail . ' pass: ' . $password . '   nice </h1>';
        if (!$this->emails->sendHtmlEmail($addressee, $subject, $htmlEmail)) {
            // $message = 'Aspirant registration email failed to be sent {"user_id": "' . $this->userId . '"}';
            // log_message('error', $message);

            // TODO: Crear excepcion custom para correos
            throw new Exception('Ha ocurrido un error al intentar enviar el correo');
        }
        // $message = 'Aspirant registration email sent successfully {"user_id": "' . $this->userId . '", "email": "' . $addressee . '"}';
        // log_message('info', $message);
    }

    public function newuser($username, $email, $password)
    {
        $users = auth()->getProvider();

        $user = new User([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $user->addGroup('alumnos');

        $user->deactivate();
        $user->forcePasswordReset();

        return $user;
    }
}
