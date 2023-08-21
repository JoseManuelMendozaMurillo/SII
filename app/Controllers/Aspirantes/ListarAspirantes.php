<?php

namespace App\Controllers\Aspirantes;

use App\Models\Aspirantes\AspiranteModel;
use CodeIgniter\Controller;

class ListarAspirantes extends Controller
{
    public function index()
    {
        $model = new AspiranteModel();

        $data['aspirantes'] = $model->findAll();

        return view('lista_aspirantes', $data);
    }

    public function cambiarEstadoPago()
    {
        $request = service('request'); // Obtener el objeto de solicitud

        if ($request->isAJAX()) {
            $user_id = $request->getPost('user_id');
            // Realiza la lógica para cambiar el estado de pago en la base de datos
            $aspiranteModel = new AspiranteModel();
            $aspirante = $aspiranteModel->find($user_id);
            if ($aspirante->estatus_pago == 'Pendiente') {
                $aspirante->estatus_pago = 'Pagado';
            } else {
                $aspirante->estatus_pago = 'Pendiente';
            }
            $aspiranteModel->save($aspirante);

            return $this->response->setJSON(['success' => true, 'nuevo_estado' => $aspirante->estatus_pago]);
        }

        return $this->response->setJSON(['success' => false]);
    }
}
