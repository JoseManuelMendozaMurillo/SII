<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\CarreraModel;

class AuxCarreras
{
    private $carreraModel;

    public function __construct()
    {
        $this->carreraModel = new CarreraModel();
    }

    public function getCarreraByID($id)
    {
        return $this->carreraModel->find($id)->toArray();
    }

    public function getCarreras()
    {
        $carreas = [];
        $carrerasData = $this->carreraModel->getAsArray();
        foreach ($carrerasData as $carrera) {
            if ($carrera['estatus'] != 4) {
                $data = [
                    'id_carrera' => $carrera['id_carrera'],
                    'clave_carrera' => $carrera['clave_carrera'],
                    'nombre_carrera' => $carrera['nombre_carrera'],
                    'estatus' => $carrera['estatus'],
                ];

                array_push($carreas, $data);
            }
        }

        return $carreas;
    }

    public function getCarrerasBorrador()
    {
        $carreas = [];
        $carrerasData = $this->carreraModel->getAsArray();
        foreach ($carrerasData as $carrera) {
            if ($carrera['estatus'] == 1) {
                $data = [
                    'id_carrera' => $carrera['id_carrera'],
                    'clave_carrera' => $carrera['clave_carrera'],
                    'nombre_carrera' => $carrera['nombre_carrera'],
                    'estatus' => $carrera['estatus'],
                ];

                array_push($carreas, $data);
            }
        }

        return $carreas;
    }

    public function getCarrerasActivas()
    {
        $carreas = [];
        $carrerasData = $this->carreraModel->getAsArray();
        foreach ($carrerasData as $carrera) {
            if ($carrera['estatus'] == 2) {
                $data = [
                    'id_carrera' => $carrera['id_carrera'],
                    'clave_carrera' => $carrera['clave_carrera'],
                    'nombre_carrera' => $carrera['nombre_carrera'],
                    'estatus' => $carrera['estatus'],
                ];

                array_push($carreas, $data);
            }
        }

        return $carreas;
    }

    public function getCarrerasInactivas()
    {
        $carreas = [];
        $carrerasData = $this->carreraModel->getAsArray();
        foreach ($carrerasData as $carrera) {
            if ($carrera['estatus'] == 3) {
                $data = [
                    'id_carrera' => $carrera['id_carrera'],
                    'clave_carrera' => $carrera['clave_carrera'],
                    'nombre_carrera' => $carrera['nombre_carrera'],
                    'estatus' => $carrera['estatus'],
                ];

                array_push($carreas, $data);
            }
        }

        return $carreas;
    }
}
