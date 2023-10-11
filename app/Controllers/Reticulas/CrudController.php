<?php

namespace App\Controllers\Reticulas;

use App\Controllers\BaseController;
use Exception;

class CrudController extends BaseController
{
    protected $model;
    protected $entity;
    protected $name;
    protected $operationValidator;

    public function __construct($model, $entity, $name, $operationValidator)
    {
        $this->model = new $model();
        $this->entity = $entity;
        $this->name = $name;
        $this->operationValidator = new $operationValidator();
    }

    ////////////////////////////////////
    //
    //     DB OPERATIONS THRU AJAX
    //
    ////////////////////////////////////

    // Model's save method performs both insert and update
    // To update, id_X must be found in $data array
    // Otherwise, an insert is performed
    public function create()
    {
        // The validation was successful.

        try {
            // if (!$this->request->isAJAX()) {
            //     throw new Exception('No se encontró el recurso', 404);
            // }
            $data = $this->request->getPost();

            if (!$this->validation->run($data, $this->name)) {
                // The validation failed.
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            $entity = new $this->entity();
            $entity->fill($data);
            $this->model->save($entity);

            return $this->response->setStatusCode(201)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function update()
    {
        try {
            // if (!$this->request->isAJAX()) {
            //     throw new Exception('No se encontró el recurso', 404);
            // }
            $data = $this->request->getPost();

            // Update
            if (isset($data['id_' . $this->name])) {
                $object = $this->model->find($data['id_' . $this->name]);

                dd($this->operationValidator->canUpdate($object));
            } else {
                dd('No tiene ID');

                throw new Exception('No se encontró el recurso', 404);
            }

            if (!$this->validation->run($data, $this->name)) {
                // The validation failed.
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }

            $entity = new $this->entity();
            $entity->fill($data);
            $this->model->save($entity);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function delete()
    {
        dd('Registro eliminado: ' . $this->name);

        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            // $data = $this->request->getPost();

            $id = $this->request->getPost('id');

            dd($this->operationValidator->canDelete($this->model->find($id)));

            $this->model->delete($id);

            return $this->response->setStatusCode(204)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    ////////////////////////////////////
    //
    //     RETRIEVE METHODS
    //
    ////////////////////////////////////

    public function getByID($id)
    {
        $data = $this->model->find($id)->toArray();

        dd($data);
        // return $data;
    }

    // Returns all records as Entity
    public function show()
    {
        $data = $this->model->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        dd($array);
        // return $array;
    }

    ////////////////////////////////////
    //
    //     TEST METHODS
    //
    ////////////////////////////////////

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
            'route' => $this->name . '/update',
        ];

        return view('Reticulas/testid', $data);
    }

    // DB operations
    public function delete()
    {
        dd('Registro eliminado: ' . $this->name);

        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            // $data = $this->request->getPost();

            $id = $this->request->getPost('id');

            $this->model->delete($id);

            return $this->response->setStatusCode(200)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
    }

    // Model's save method performs both insert and update
    // To update, id_X must be found in $data array
    // Otherwise, an insert is performed
    public function save()
    {
        // The validation was successful.

        try {
            if (!$this->request->isAJAX()) {
                throw new Exception('No se encontró el recurso', 404);
            }
            $data = $this->request->getPost();

            if (!$this->validation->run($data, $this->name)) {
                // The validation failed.
                $errors = $this->validation->getErrors();

                throw new Exception($errors[array_key_first($errors)], 400);
            }
            $entity = new $this->entity();
            $entity->fill($data);
            $this->model->save($entity);

            return $this->response->setStatusCode(201)->setJSON(['success' => true]);
        } catch (Exception $e) {
            return $this->response->setStatusCode($e->getCode())->setJSON(['error' => $e->getMessage()]);
        }
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
        //dd($array);
    }
}
