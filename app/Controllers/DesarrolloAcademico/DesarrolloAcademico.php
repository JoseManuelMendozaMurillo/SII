<?php

namespace App\Controllers\DesarrolloAcademico;

use App\Controllers\BaseController;
use App\Models\Aspirantes\AspiranteModel;

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

        $data = [
            'nombreModulo' => 'Desarrollo Academico',
            'numAspPaymentPaid' => $numAspPaymentPaid,
            'numAspPaymentPending' => $numAspPaymentPending,
            'numTotalAsp' => $numTotalAsp,
            'aspirantes' => $aspirantes,
        ];

        $this->twig->display('DesarrolloAcademico/lista_aspirantes', $data);
    }
}
