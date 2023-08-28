<?php

namespace App\Libraries;

use Exception;
use CodeIgniter\HTTP\CURLRequest;
use Config\App;
use CodeIgniter\HTTP\URI;

class Emails
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    /**
     * @name sendHtmlEmail
     *
     * @description Funcion para enviar un email con contenido html
     *
     * @param string $emailTo, $subject, $htmlMessage
     *
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
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * sendHtmlEmailFromBrevo
     * Función para enviar un email de verdad utilizando el servico Brevo (Este servicio permite un maximo de 300
     * emails por dia en su plan gratuito)
     *
     * @param string $name        -> Nombre del destinatario
     * @param string $emailTo     -> Dirección de correo electronico del destinatario
     * @param string $subject     -> Asunto del correo
     * @param string $htmlMessage -> Contenido del correo html
     *
     * @return bool $status -> Retorna true si el correo se envio, de lo contrario retorna false
     */
    public function sendHtmlEmailFromBrevo(string $name, string $emailTo, string $subject, string $htmlMessage): bool
    {
        $url = 'https://api.brevo.com/v3/';
        $apiKey = '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';

        $client = new CURLRequest(new App(), new URI($url));

        // Enviamos los datos del correo
        $data = [
            'sender' => [
                'name' => 'SII',
                'email' => 'ocotlan.tecnm@gmail.com',
            ],
            'to' => [
                [
                    'email' => $emailTo,
                    'name' => $name,
                ],
            ],
            'subject' => $subject,
            'htmlContent' => $htmlMessage,
        ];

        // Configuración de la solicitud cURL
        $response = $client->setBody(json_encode($data))
                           ->setHeader('accept', 'application/json')
                           ->setHeader('api-key', $apiKey)
                           ->setHeader('content-type', 'application/json')
                           ->request('POST', 'smtp/email');

        // En caso de que haya habido un error
        if ($response->getStatusCode() >= 400) {
            return false;
        }

        return true;
    }
}
