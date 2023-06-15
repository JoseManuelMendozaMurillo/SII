<?php 

namespace App\Libraries;

use Config\Email as ConfigEmail; // usamos 'as' para renombrar Config\Email a ConfigEmail
use CodeIgniter\Email\Email;

class Emails
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    /**
     * @name sendHtmlEmail
     * @description Funcion para enviar un email con contenido html
     * 
     * @param string $emailTo, $subject, $htmlMessage
     * @return bool
     */
    public function sendHtmlEmail($emailTo, $subject, $htmlMessage)
    {
        // Configuración del email
        $this->email->setTo($emailTo);

        // Mensaje del email
        $this->email->setSubject($subject);
        $this->email->setMessage($htmlMessage);

        // Enviamos el email y retornamos true si se envio o false si no se envio
        if ($this->email->send())
        {
            return true;
        } 
        else
        {
            return false;
        }
    }
}


?>