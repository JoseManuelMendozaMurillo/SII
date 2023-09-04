<?php

namespace App\Controllers\Aspirantes;

use App\Models\Aspirantes\AspiranteModel;
use CodeIgniter\Controller;

class ListarAspirantes extends Controller
{
    /*public function index()
    {
        $model = new AspiranteModel();

        $data['aspirantes'] = $model->findAll();

        return view('lista_aspirantes', $data);
    }*/

    public function cambiarEstadoPago()
    {
        $request = service('request'); // Obtener el objeto de solicitud

        if ($request->isAJAX()) {
            $user_id = $request->getPost('user_id');
            // Realiza la lógica para cambiar el estado de pago en la base de datos
            $aspiranteModel = new AspiranteModel();
            $aspirante = $aspiranteModel->find($user_id);
            $nuevo_estado = !$aspirante->status_pago;

            $result = $aspiranteModel->changeStatusPayment($user_id, $nuevo_estado);
            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'nuevo_estado' => $nuevo_estado ? 'Pagado' : 'Pendiente'
                ]);
            }
        }

        return $this->response->setJSON(['success' => false]);
    }
}
