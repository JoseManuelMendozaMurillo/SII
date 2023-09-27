<?php

namespace App\Libraries;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;

class exportPdf
{
    protected $twig;
    protected $response;

    public function __construct()
    {
        // Constructor
        $this->twig = new Twig();
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
        // return $this->response->setStatusCode(200)
        //                       ->setBody($pdfContent)
        //                       ->setHeader('Content-Type', 'application/pdf')
        //                       ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
        //                       ->setHeader('Cache-Control', 'max-age=0');

        return $pdfContent;
    }
}
