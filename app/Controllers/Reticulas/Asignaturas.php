<?php

namespace App\Controllers\Reticulas;

// Asignaturas controller

use App\Controllers\BaseController;
use App\Models\Reticulas\AsignaturaModel;
use App\Entities\Reticulas\Asignatura;

class Asignaturas extends BaseController
{
    protected $asignaturaModel;

    public function __construct()
    {
        $this->asignaturaModel = new AsignaturaModel();
    }

    // Views

    // Displays a form to add/update an asignatura
    public function formAsignatura()
    {
        $id = $this->request->getPost('id');
        $data = [];

        if ($id != null) {
            $data = $this->asignaturaModel->find($id)->toArray();
        }

        return view('Reticulas/form_asignatura', $data);
    }

    // Simple form to send id_asignatura via post
    // Test/Dev method
    public function testID()
    {
        $data = [
            'route' => '',
        ];

        return view('Reticulas/testid', $data);
    }

    // DB operations
    public function deleteAsignatura()
    {
        $id = $this->request->getPost('id');

        $this->asignaturaModel->delete($id);

        dd('Registro eliminado');
    }

    // Model's save method performs both insert and update
    // To update, id_asignatura must be found in $data array
    // Otherwise, an insert is performed
    public function saveAsignatura()
    {
        $data = $this->request->getPost();

        $asignatura = new Asignatura();
        $asignatura->fill($data);

        $this->asignaturaModel->save($asignatura);

        d($this->asignaturaModel->getInsertID());
    }

    // UTILItY / TEST

    // Returns all records as Asignatura Entity
    public function asignatura()
    {
        $asignatura = $this->asignaturaModel->find();
        dd($asignatura);
    }
}
