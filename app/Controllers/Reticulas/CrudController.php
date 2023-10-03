<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;

class CrudController extends BaseController
{
    protected $model;
    protected $entity;
    protected $name;

    public function __construct($model, $entity, $name)
    {
        $this->model = new $model();
        $this->entity = $entity;
        $this->name = $name;
    }

    // Displays a form to add/update
    public function form()
    {
        $id = $this->request->getPost('id');
        $data = [];

        if ($id != null) {
            $data = $this->model->find($id)->toArray();
        }

        return view('Reticulas/form_' . $this->name, $data);
    }

    // Simple form to send id_especialidad via post
    // Test/Dev method
    public function testID()
    {
        $data = [
            'route' => $this->name . '/delete',
        ];

        return view('Reticulas/testid', $data);
    }

    // DB operations
    public function delete()
    {
        $id = $this->request->getPost('id');

        $this->model->delete($id);

        dd('Registro eliminado: ' . $this->name);
    }

    // Model's save method performs both insert and update
    // To update, id_X must be found in $data array
    // Otherwise, an insert is performed
    public function save()
    {
        $data = $this->request->getPost();

        $entity = new $this->entity();
        $entity->fill($data);

        // dd($especialidad);

        $this->model->save($entity);

        d($this->model->getInsertID());
    }

    public function getByID($id)
    {
        $data = $this->model->find($id)->toArray();
        dd($data);
    }

    // UTILItY / TEST

    // Returns all records as Entity
    public function show()
    {
        $data = $this->model->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }
        dd($array);
    }
}
