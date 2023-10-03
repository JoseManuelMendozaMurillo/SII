<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Reticulas\CarreraModel;
use App\Entities\Reticulas\Carrera;

class Carreras extends BaseController
{
    protected $carreraModel;

    public function __construct()
    {
        $this->carreraModel = new CarreraModel();
    }

    // Displays a form to add/update a carrera
    public function formCarrera()
    {
        $id = $this->request->getPost('id');
        $data = [];

        if ($id != null) {
            $data = $this->carreraModel->find($id)->toArray();
        }

        return view('Reticulas/form_carrera', $data);
    }

    // Simple form to send id_asignatura via post
    // Test/Dev method
    public function testID()
    {
        $data = [
            'route' => 'carrera/delete',
        ];

        return view('Reticulas/testid', $data);
    }

    // DB operations
    public function deleteCarrera()
    {
        $id = $this->request->getPost('id');

        $this->carreraModel->delete($id);

        dd('Registro eliminado');
    }

    // Model's save method performs both insert and update
    // To update, id_carrera must be found in $data array
    // Otherwise, an insert is performed
    public function saveCarrera()
    {
        $data = $this->request->getPost();

        $carrera = new Carrera();
        $carrera->fill($data);

        $this->carreraModel->save($carrera);

        d($this->carreraModel->getInsertID());
    }

    // UTILItY / TEST

    // Returns all records as Carrera Entity
    public function carrera()
    {
        dd($this->carreraModel->find());
    }
}
