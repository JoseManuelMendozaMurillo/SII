<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreaVistasReticulas extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $prefijo = 'View';

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
            //busqueda de cada especialidad
            $subquery = $this->db->table($especialidades)->select('nombre_especialidad')->where($id_especialidad, $i);
            $result = $subquery->get()->getRow();
            $nombre = $result->nombre_especialidad;
            $corregido = str_replace(' ', '_', $nombre);
            $declaracion = $prefijo . 'Asignaturas_' . $corregido;
            $this->db->query(
                'create VIEW ' . substr($declaracion, 0, 64) .
                ' AS select a.id_asignatura ,a.clave_asignatura ,a.nombre_asignatura ,a.horas_teoricas ,a.horas_practicas ,ae.semestre_recomendado,a.id_tipo_asignatura,(select tipo_asignatura from tipo_asignatura WHERE id_tipo_asignatura=a.id_tipo_asignatura) as tipo_asignatura
            from asignaturas_especialidad as ae join asignaturas as a 
            on ae.id_asignatura  = a.id_asignatura where ae.id_especialidad =' .
                $i .
                ';'
            );
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
            //busqueda de cada especialidad
            $subquery = $this->db->table($carreras)->select('nombre_carrera')->where($id_carrera, $i);
            $result = $subquery->get()->getRow();
            $nombre = $result->nombre_carrera;
            $corregido = str_replace(' ', '_', $nombre);
            $declaracion = $prefijo . 'Asignaturas_' . $corregido;

            $this->db->query(
                'create VIEW ' . substr($declaracion, 0, 64) .
                ' AS select a.id_asignatura ,a.clave_asignatura ,a.nombre_asignatura ,a.horas_teoricas ,a.horas_practicas ,ac.semestre_recomendado,a.id_tipo_asignatura,(select tipo_asignatura from tipo_asignatura WHERE id_tipo_asignatura=a.id_tipo_asignatura) as tipo_asignatura
            from asignaturas_carrera ac join asignaturas as a 
            on ac.id_asignatura  = a.id_asignatura where ac.id_carrera =' .
                $i .
                ';'
            );
        }
        /*
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
                }*/
    }
}
