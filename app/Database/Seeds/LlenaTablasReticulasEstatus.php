<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaTablasReticulasEstatus extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        //busqueda de los valores enestatus reticulas
        $estatus_reticula = 'estatus_reticula';
        $id_estatus = 'id_estatus';

        $query = $this->db->table($estatus_reticula);
        $query->selectMax($id_estatus);
        $result = $query->get()->getRow();
        $MaxIdEstatus = $result->$id_estatus;

        $query = $this->db->table($estatus_reticula);
        $query->selectMin($id_estatus);
        $result = $query->get()->getRow();
        $MinIdEstatus = $result->$id_estatus;
        //busqueda de valores en asignaturas
        $asignaturas = 'asignaturas';
        $id_asignatura = 'id_asignatura';

        $query = $this->db->table($asignaturas);
        $query->selectMax($id_asignatura);
        $result = $query->get()->getRow();
        $MaxIdAsignatura = $result->$id_asignatura;

        $query = $this->db->table($asignaturas);
        $query->selectMin($id_asignatura);
        $result = $query->get()->getRow();
        $MinIdAsignatura = $result->$id_asignatura;
        //sembrar valores
        for ($i = $MinIdAsignatura; $i < $MaxIdAsignatura + 1; $i++) {
            $NewEstatus = $faker->numberBetween($MinIdEstatus, $MaxIdEstatus);
            $query =
                        $this->db->query('update ' . $asignaturas . ' set estatus = ' . $NewEstatus . ' where ' . $id_asignatura . ' = ' . $i);
        }

        //busqueda de valores en especialidades
        $especialidades = 'especialidades';
        $id_especialidad = 'id_especialidad';

        $query = $this->db->table($especialidades);
        $query->selectMax($id_especialidad);
        $result = $query->get()->getRow();
        $MaxIdAsignatura = $result->$id_especialidad;

        $query = $this->db->table($especialidades);
        $query->selectMin($id_especialidad);
        $result = $query->get()->getRow();
        $MinIdAsignatura = $result->$id_especialidad;
        //sembrar valores
        for ($i = $MinIdAsignatura; $i < $MaxIdAsignatura + 1; $i++) {
            $NewEstatus = $faker->numberBetween($MinIdEstatus, $MaxIdEstatus);
            $query =
                        $this->db->query('update ' . $especialidades . ' set estatus = ' . $NewEstatus . ' where ' . $id_especialidad . ' = ' . $i);
        }

        //busqueda de valores en carreras
        $carreras = 'carreras';
        $id_carrera = 'id_carrera';

        $query = $this->db->table($carreras);
        $query->selectMax($id_carrera);
        $result = $query->get()->getRow();
        $MaxIdAsignatura = $result->$id_carrera;

        $query = $this->db->table($carreras);
        $query->selectMin($id_carrera);
        $result = $query->get()->getRow();
        $MinIdAsignatura = $result->$id_carrera;
        //sembrar valores
        for ($i = $MinIdAsignatura; $i < $MaxIdAsignatura + 1; $i++) {
            $NewEstatus = $faker->numberBetween($MinIdEstatus, $MaxIdEstatus);
            $query =
                        $this->db->query('update ' . $carreras . ' set estatus = ' . $NewEstatus . ' where ' . $id_carrera . ' = ' . $i);
        }

        //busqueda de valores en reticulas
        $reticulas = 'reticulas';
        $id_reticula = 'id_especialidad';

        $query = $this->db->table($reticulas);
        $query->selectMax($id_reticula);
        $result = $query->get()->getRow();
        $MaxIdAsignatura = $result->$id_reticula;

        $query = $this->db->table($reticulas);
        $query->selectMin($id_reticula);
        $result = $query->get()->getRow();
        $MinIdAsignatura = $result->$id_reticula;
        //sembrar valores
        for ($i = $MinIdAsignatura; $i < $MaxIdAsignatura + 1; $i++) {
            $NewEstatus = $faker->numberBetween($MinIdEstatus, $MaxIdEstatus);
            $query =
                        $this->db->query('update ' . $reticulas . ' set estatus = ' . $NewEstatus . ' where ' . $id_reticula . ' = ' . $i);
        }
    }
}
