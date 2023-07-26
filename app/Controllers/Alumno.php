<?php

namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\CarrerasModel;
use App\Models\GruposModel;

class Alumno extends BaseController
{
    protected $AlumnoModel;

    public function __construct()
    {
        $this->AlumnoModel = new AlumnoModel();
    }

    public function index()
    {
        if ($this->session->getFlashdata('alert') == null) {
            $data = [
                'alert' => false,
                'typeAlert' => null,
                'textAlert' => null,
            ];
        } else {
            $data = [
                'alert' => true,
                'typeAlert' => $this->session->getFlashdata('alert')['typeAlert'],
                'textAlert' => $this->session->getFlashdata('alert')['textAlert'],
            ];
        }
        $data += [
            'alumnos' => $this->AlumnoModel->getAll(),
        ];
        echo view('Alumnos/listado', $data);
    }

    public function form($id = '')
    {
        $CarrerasModel = new CarrerasModel();
        $data = [
            'carreras' => $CarrerasModel->getAll(),
        ];
        if ($id != '') {
            $GruposModel = new GruposModel();
            $alumno = $this->AlumnoModel->getById($id);
            $data += [
                'alumno' => $alumno,
                'grupos' => $GruposModel->getBy($alumno->id_carrera, $alumno->semestre),
            ];
        }
        echo view('Alumnos/form', $data);
    }

    public function add()
    {
        //Validamos los datos
        if (!$this->validatesData()) {
            // Si el semestre y la carrera ya se seleccionaron
            $semestre = $this->request->getPost('selectSemestre');
            $carrera = $this->request->getPost('selectCarrera');
            if ($semestre != '' && $carrera != '') {
                $GruposModel = new GruposModel();

                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors())
                                                      ->with('grupos', $GruposModel->getBy($carrera, $semestre));
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }
        }

        //Si los datos se validarion, los insertamos
        $data = [
            'nombre' => $this->request->getPost('name'),
            'num_control' => $this->request->getPost('numControl'),
            'id_carrera' => $this->request->getPost('selectCarrera'),
            'semestre' => $this->request->getPost('selectSemestre'),
            'id_grupo' => $this->request->getPost('selectGrupo'),
        ];

        if (!$this->AlumnoModel->insertData($data)) {
            // Si no se creo el registro
            $this->session->setFlashdata('alert', [
                'typeAlert' => 'danger',
                'textAlert' => 'Hubo un error al agregar al alumno',
            ]);

            return redirect('alumno/listado');
        }

        // Sí todo salio bien
        $this->session->setFlashdata('alert', [
            'typeAlert' => 'success',
            'textAlert' => 'El alumno se registro correctamente',
        ]);

        return redirect('alumno/listado');
    }

    public function update($id)
    {
        // Validamos los datos
        if (!$this->validatesData()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        //Si los datos se validarion, los insertamos
        $data = [
            'nombre' => $this->request->getPost('name'),
            'num_control' => $this->request->getPost('numControl'),
            'id_carrera' => $this->request->getPost('selectCarrera'),
            'semestre' => $this->request->getPost('selectSemestre'),
            'id_grupo' => $this->request->getPost('selectGrupo'),
        ];

        if (!$this->AlumnoModel->updateData($id, $data)) {
            // Si no se actualizo el registro
            $this->session->setFlashdata('alert', [
                'typeAlert' => 'danger',
                'textAlert' => 'Hubo un error al actualizar la informacion del alumno',
            ]);

            return redirect('alumno/listado');
        }

        // Sí todo salio bien
        $this->session->setFlashdata('alert', [
            'typeAlert' => 'success',
            'textAlert' => 'El alumno se actualizo correctamente',
        ]);

        return redirect('alumno/listado');
    }

    public function delete($id)
    {
        if (!$this->AlumnoModel->deleteData($id)) {
            // Si no se elimino el registro
            $this->session->setFlashdata('alert', [
                'typeAlert' => 'danger',
                'textAlert' => 'Hubo un error al eliminar el alumno',
            ]);

            return redirect('alumno/listado');
        }

        // Sí todo salio bien
        $this->session->setFlashdata('alert', [
            'typeAlert' => 'success',
            'textAlert' => 'El alumno se elimino correctamente',
        ]);

        return redirect('alumno/listado');
    }

    public function grupos()
    {
        if (!$this->request->isAJAX()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // En caso de que todo este correcto
        $GruposModel = new GruposModel();
        $id_carrera = $this->request->getPost('id_carrera');
        $semestre = $this->request->getPost('semestre');
        if (!$grupos = $GruposModel->getBy($id_carrera, $semestre)) {
            return $this->response->setStatusCode(500);
        }

        return $this->response->setStatusCode(200)->setJSON($grupos);
    }

    /* Validaciones */
    protected function validatesData()
    {
        $check_unique_num_control = function () {
            // Obtenemos los datos
            $numControl = $this->request->getPost('numControl');
            $id = $this->request->getPost('id');

            // Verifica si el número de control ya existe en la base de datos
            $this->AlumnoModel->where('num_control', $numControl);

            // Si estamos actualizando, excluye el registro actual
            if (!empty($id)) {
                $this->AlumnoModel->whereNotIn('id_alumno', [$id]);
            }

            $result = $this->AlumnoModel->first();

            // Si se encontró un resultado, entonces el número de control no es único
            if (!is_null($result)) {
                return false;
            }

            return true;
        };

        $this->validation->setRule('name', 'Nombre', 'required');
        $this->validation->setRule('numControl', 'Número de control', ['required', 'numeric', 'exact_length[8]', $check_unique_num_control]);
        $this->validation->setRule('selectCarrera', 'Carrera', 'required|numeric|is_not_unique[Carreras.id_carrera]');
        $this->validation->setRule('selectSemestre', 'Semestre', 'required|numeric|in_list[2,4,6,8]');
        $this->validation->setRule('selectGrupo', 'Grupo', 'required|numeric|is_not_unique[Grupos.id_grupo]');

        if ($this->validation->withRequest($this->request)->run()) {
            return true;
        }

        return false;
    }
}
