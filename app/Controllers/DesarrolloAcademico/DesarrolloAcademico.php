<?php

namespace App\Controllers\DesarrolloAcademico;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use CodeIgniter\HTTP\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DesarrolloAcademico extends BaseController
{
    /**
     * listAspirantes
     * Función para mostrar la vista de aspirante para desarrollo academico
     *
     * @return void
     */
    public function listAspirantes(): void
    {
        // Obtenemos los datos necesarios
        $aspiranteModel = new AspiranteModel();
        $dataAspirante = $aspiranteModel->getByStatusPayment(true);

        // Trabajamos los datos para enviar solo lo necesario
        /**
         * Número de aspirantes que ya pagarón
         *
         * @var int $numAspPaymentPaid
         */
        $numAspPaymentPaid = $dataAspirante['totalAspirantes'];
        unset($dataAspirante['totalAspirantes']);

        /**
         * Número de aspirantes que faltan por pagar
         *
         * @var int numAspPaymentPending
         */
        $numAspPaymentPending = $aspiranteModel->countByStatusPayment(false);

        /**
         * Número total de aspirantes
         *
         * @var int $numTotalAsp
         */
        $numTotalAsp = $aspiranteModel->countAllResults();

        $aspirantes = [];
        foreach ($dataAspirante as $aspirante) {
            $aspirante['photo'] = $aspirante['pathPhotos'] . '/' . 'thumbs' . '/' . $aspirante['photo'];
            unset($aspirante['pathPhotos']);
            $aspirantes[] = $aspirante;
        }
        $percent = (float) 100 * $numAspPaymentPaid / ($numAspPaymentPending + $numAspPaymentPaid);

        $data = [
            'nombreModulo' => 'Desarrollo Academico',
            'numAspPaymentPaid' => $numAspPaymentPaid,
            'numAspPaymentPending' => $numAspPaymentPending,
            'numTotalAsp' => $numTotalAsp,
            'aspirantes' => $aspirantes,
            'percent' => $percent,
        ];

        $this->twig->display('DesarrolloAcademico/lista_aspirantes', $data);
    }

    /**
     * exportAcademicDevReport
     * Función que permite crear y descargar el archivo excel que desarrollo academico envia a Mexico con
     * los datos de los aspirantes que deben hacer su examen de admisión
     *
     * @return Response
     */
    public function exportAcademicDevReport(): Response
    {
        // Creamos la hoja de excel
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
        $aspirantesModel = new AspiranteModel();
        $aspirantes = $aspirantesModel->getDataForAcademicDevReport();
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
                    ->setHeader('Content-Disposition', 'attachment;filename="aspirantes.xlsx"')
                    ->setHeader('Cache-Control', 'max-age=0');
    }
}
