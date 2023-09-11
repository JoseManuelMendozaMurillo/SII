<?php

namespace App\Controllers\Aspirantes\Test;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use App\Models\ServiciosEscolares\CarrerasModel;
use App\Libraries\Emails;
use App\Libraries\Files;
use CodeIgniter\HTTP\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

class AspirantesTest extends BaseController
{
    protected $aspirantesModel;
    protected $db;

    public function __construct()
    {
        $this->aspirantesModel = new AspiranteModel();
        $this->db = db_connect();
    }

    /**
     * simulateFormInsert
     * Funcion para simular una insercion de un aspirante
     *
     * @return void
     */
    public function simulateFormInsert()
    {
        // Simula los datos del formulario que deseas enviar
        $imagePath = FCPATH . 'Uploads/Aspirantes/FotosAspirantes/test.png'; // Imagen para pruebas
        $mimeType = mime_content_type($imagePath);
        $photoAspirante = new \CURLFile($imagePath);
        $photoAspirante->setMimeType($mimeType);
        $photoAspirante->setPostFilename('foto');

        $formFields = [
            // Tabla principal
            'multipart' => [
                'foto' => $photoAspirante,
                'curp' => 'MEMM011201HJCNRNA1',
                'apellidoPaterno' => 'MENDOZA',
                'apellidoMaterno' => 'MURILLO',
                'nombre' => 'JOSE MANUEL',
                'fechaNacimiento' => '12-01-2001',
                'genero' => 'MASCULINO',
                'estadoCivil' => '1',
                'paisNacimiento' => 'MEXICO',
                'tel' => '3921279642',
                'correo' => 'trokillox.x@gmail.com',
                'nombreEscuela' => 'CBTIS49',
                'estadoEscuela' => 'JALISCO',
                'municipioEscuela' => 'OCOTLAN',
                'anioEgreso' => '2017',
                'promedio' => '83.4',
                'primeraOpcionIngreso' => '1',
                'segundaOpcionIngreso' => '1',
                'turno' => 'MATUTINO',
                'primeraOpcion' => 'SI',
                'motivoIngreso' => '1',
                'motivoSeleccionPlanEstudio' => 'PRUEBAS',
                // Tabla de datos complementarios
                'calle' => 'PABLO LOPEZ',
                'numExterior' => '87',
                'numInterior' => null,
                'letraExterior' => 'A',
                'letraInterior' => null,
                'colonia' => 'EL TROMPO',
                'estadoResidencia' => 'JALISCO',
                'municipioResidencia' => 'JAMAY',
                'cp' => '47900',
                'entreCalles' => 'AGUSTIN YAÑEZ Y LAUREL',
                'nombreTutor' => 'JAVIER MENDOZA ALVAREZ',
                'estadoProcedencia' => 'JALISCO',
                'comunidadIndigena' => '1',
                'tipoSangre' => '1',
                'discapacidad' => 'PRUEBAS',
                'lenguaIndigena' => '1',
                'telTutor' => '3921106055',
                'nivelEstudioPadre' => '1',
                'nivelEstudioMadre' => '1',
                'cohabitantes' => '1',
                'ocupacionPadre' => '1',
                'ocupacionMadre' => '1',
                'propiedadCasa' => '1',
                'cantidadCuartos' => '1',
                'cantidadCohabitantes' => '1',
                'regaderas' => '1',
                'cantidadBanos' => '1',
                'cantidadFocos' => '1',
                'tipoPiso' => '1',
                'cantidadAutos' => '1',
                'estufa' => '1',
            ],

            'verify' => false,
        ];

        $baseUrl = config('App')->baseURL;
        $client = new \CodeIgniter\HTTP\CURLRequest(
            new \Config\App(),
            new \CodeIgniter\HTTP\URI($baseUrl),
        );

        $response = $client->request('POST', 'aspirantes/insert', $formFields);

        // Maneja la respuesta como necesites
        // Por ejemplo, muestra el contenido de la respuesta
        echo $response->getBody();
    }

    /**
     * delete
     * Funcion para eliminar fisicamente a un aspirante
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
            $this->aspirantesModel->delete($aspirante->id_aspirante, true);

            if (!$users->delete($userId, true)) {
                throw new Exception('Hubo un error al intentar eliminar al aspirante de las tablas de usuarios');
            }

            // Eliminamos las imagenes
            $dirPhotosAspirantes = config('Paths')->photoAspiranteDirectory . '/' . $userId;
            $files = new Files();
            $files->deleteDir($dirPhotosAspirantes);

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
     * sendEmail
     * Función para testear el envio del correo al aspirante cuando completa su registro
     * y como se ve el correo
     *
     * @return void
     */
    public function sendEmail(): void
    {
        // Enviamos el correo con la informacion de inicio sesion al aspirante
        // Obtención de datos para generar el correo
        $carrerasModel = new CarrerasModel();
        $idCarrera = '1';
        $pathPhoto = config('Paths')->accessPhotosAspirantes . '/test.png';
        $dataEmail = [
            'aspirante' => [
                'nombre' => 'Jose Manuel',
                'apellidoPaterno' => 'Mendoza',
                'apellidoMaterno' => 'Murillo',
                'noSolicitude' => '0001',
                'nip' => '4455',
                'foto' => $pathPhoto,
                'carrera' => $carrerasModel->getNameById($idCarrera),
                'anoIngreso' => date('Y'),
            ],
        ];
        // Enviamos el correo
        $emails = new Emails();
        $addressee = 'trokillox.x@gmail.com';
        $subject = '¡Felicidades por inscribirte al Tecnológico de Ocotlán!';
        $htmlEmail = $this->twig->render('Correos/email', $dataEmail);
        if (!$emails->sendHtmlEmail($addressee, $subject, $htmlEmail)) {
            dd('El correo no se envio');
        }
        $this->twig->display('Correos/email', $dataEmail);
    }

    /**
     * exportPdf
     * Función para probar la exportacion de documentos pdf
     *
     * @return Response
     */
    public function exportPdf()
    {
        $options = new Options();
        $options->setChroot(FCPATH);
        $options->setDefaultFont('Inter');
        $options->setIsRemoteEnabled(true);

        $fullName = 'Jose Manuel Mendoza Murillo';
        $pathPhoto = config('Paths')->accessPhotosAspirantes . '/' . 'test.png';
        $html = $this->twig->render('Aspirantes/pdf_templates/pdf_aspirantes', [
            'fullName' => $fullName,
            'curp' => 'PEGJ850315HJCRRN07',
            'noSolicitude' => '0001',
            'nip' => '3654',
            'firstOption' => 'Ingeniería en Sistemas Computacionales',
            'pathPhoto' => $pathPhoto,
        ]);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();

        $pdfContent = $dompdf->output();
        $fileName = 'Pruebas.pdf';

        // Enviar la respuesta al cliente
        return $this->response->setStatusCode(200)
                              ->setBody($pdfContent)
                              ->setHeader('Content-Type', 'application/pdf')
                              ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
                              ->setHeader('Cache-Control', 'max-age=0');
    }

    /**
     * exportExcel
     * Función para probar la exportacion de datos a excel
     *
     * @return Response
     */
    public function exportExcel(): Response
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        /* Definimos los encabezados de la hoja de datos */
        // Columna A
        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->setCellValue('A1', 'Curp');
        // Columna B
        $sheet->getColumnDimension('B')->setWidth(40);
        $sheet->setCellValue('B1', 'Nombre');
        // Columna C
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->setCellValue('C1', 'Correo');

        // Agregamos los datos
        $aspirantes = $this->aspirantesModel->getDataForAcademicDevReport();
        $row = 2;
        foreach ($aspirantes as $aspirante) {
            $fullName = implode(
                ' ',
                [
                    $aspirante['nombre'],
                    $aspirante['apellido_paterno'],
                    $aspirante['apellido_materno'],
                ]
            );
            $sheet->setCellValue('A' . $row, $aspirante['curp']);
            $sheet->setCellValue('B' . $row, $fullName);
            $sheet->setCellValue('C' . $row, $aspirante['email']);
            $row++;
        }

        // Generamos el archivo Excel
        $writer = new Xlsx($spreadsheet);

        return $this->response->setStatusCode(200)
                    ->setBody($writer->save('php://output'))
                    ->setHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    ->setHeader('Content-Disposition', 'attachment;filename="example.xlsx"')
                    ->setHeader('Cache-Control', 'max-age=0');
    }

    /**
     * finalizacionAspirantes
     * Vista para ver la pantalla de finalizacion de registro completo un aspirante
     */
    public function finalizacionAspirantes()
    {
        $pathPhoto = config('Paths')->accessPhotosAspirantes . '/' . '34' . '/thumbs//' . 'FotoAspirante_64f7baa932cca.png';

        $data = [
            'nombre' => 'Jose Manuel Mendoza Murillo',
            'curp' => 'MEMM011201HJCNRNA1',
            'carrera' => 'Ingenieria en Sistemas Computacionales',
            'foto' => $pathPhoto,
            'idUser' => '34',
        ];

        $this->twig->display('Aspirantes/finalizacion-aspirantes', $data);
    }
}
