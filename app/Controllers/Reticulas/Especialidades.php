<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use App\Models\Reticulas\EspecialidadModel;
use App\Entities\Reticulas\Especialidad;

class Especialidades extends BaseController
{
    protected $especialidadModel;

    public function __construct()
    {
        $this->especialidadModel = new EspecialidadModel();
    }

    // Displays a form to add/update a Especialidad
    public function formEspecialidad()
    {
        $id = $this->request->getPost('id');
        $data = [];

        if ($id != null) {
            $data = $this->especialidadModel->find($id)->toArray();
        }

        return view('Reticulas/form_especialidad', $data);
    }

    // Simple form to send id_especialidad via post
    // Test/Dev method
    public function testID()
    {
        $data = [
            'route' => 'especialidad/delete',
        ];

        return view('Reticulas/testid', $data);
    }

    // DB operations
    public function deleteEspecialidad()
    {
        $id = $this->request->getPost('id');

        $this->especialidadModel->delete($id);

        dd('Registro eliminado');
    }

    // Model's save method performs both insert and update
    // To update, id_especialidad must be found in $data array
    // Otherwise, an insert is performed
    public function saveEspecialidad()
    {
        $data = $this->request->getPost();

        $especialidad = new Especialidad();
        $especialidad->fill($data);

        // dd($especialidad);

        $this->especialidadModel->save($especialidad);

        d($this->especialidadModel->getInsertID());
    }

    // UTILItY / TEST

    // Returns all records as especialidad Entity
    public function especialidad()
    {
        dd($this->especialidadModel->find());
    }
}
