<?php

namespace App\Controllers\Financieros;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;
use CodeIgniter\HTTP\Response;

class Financieros extends BaseController
{
    /**
     * listAspirantes
     * Función para mostrar la vista de aspirante para recursos financieros
     *
     * @return void
     */
    public function listAspirantes(): void
    {
        // Obtenemos los datos necesarios
        $aspiranteModel = new AspiranteModel();

        // Obtenemos datos de los aspirantes que ya pagaron y los que no
        $dataAspirante = $aspiranteModel->getByStatusPayment(true);
        $dataAspirantePendingPayment = $aspiranteModel->getByStatusPayment(false);

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
        $numAspPaymentPending = $dataAspirantePendingPayment['totalAspirantes'];
        unset($dataAspirantePendingPayment['totalAspirantes']);

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
            $aspirante['status_pago'] = true;
            $aspirantes[] = $aspirante;
        }

        $aspirantesPendingPayment = [];
        foreach ($dataAspirantePendingPayment as $aspirante) {
            $aspirante['photo'] = $aspirante['pathPhotos'] . '/' . 'thumbs' . '/' . $aspirante['photo'];
            unset($aspirante['pathPhotos']);
            $aspirante['status_pago'] = false;
            $aspirantesPendingPayment[] = $aspirante;
        }

        $todosAspirantes = array_merge($aspirantes, $aspirantesPendingPayment);

        usort($todosAspirantes, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        $percent = (float) 100 * $numAspPaymentPaid / ($numTotalAsp);

        $data = [
            'nombreModulo' => 'Recursos Financieros',
            'numAspPaymentPaid' => $numAspPaymentPaid,
            'numAspPaymentPending' => $numAspPaymentPending,
            'numTotalAsp' => $numTotalAsp,
            'aspirantesPago' => $aspirantes,
            'aspirantesNoPago' => $aspirantesPendingPayment,
            'aspirantesTodos' => $todosAspirantes,
            'percent' => $percent,
        ];

        $this->twig->display('RecursosFinancieros/nuevos_aspirantes', $data);
    }
}
