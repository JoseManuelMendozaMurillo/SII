<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenadoSelectorasAspirantes extends Seeder
{
    public function run()
    {
        $data = [
            ['tipo' => 'A+'],
            ['tipo' => 'A-'],
            ['tipo' => 'B+'],
            ['tipo' => 'B-'],
            ['tipo' => 'AB+'],
            ['tipo' => 'AB-'],
            ['tipo' => 'O+'],
            ['tipo' => 'O+'],
        ];
        $this->db->table('tipos_sangre')->insertBatch($data);

        $pisos = [
            ['tipo' => 'Tierra'],
            ['tipo' => 'Baldosa'],
            ['tipo' => 'Madera'],
            ['tipo' => 'Ceramica'],
            ['tipo' => 'Marmol o granito'],
            ['tipo' => 'Alfombra'],
            ['tipo' => 'Concreto o cemento pulido'],
            ['tipo' => 'Vinilo'],
            ['tipo' => 'Resina'],
            ['tipo' => 'Otro'],
        ];
        $this->db->table('tipos_piso')->insertBatch($pisos);

        $vivienda = [
            ['propiedad' => 'Casa propia'],
            ['propiedad' => 'Casa alquilada'],
            ['propiedad' => 'Apartamento propio'],
            ['propiedad' => 'Apartamento alquilado'],
            ['propiedad' => 'Casa de familiares'],
            ['propiedad' => 'Casa compartida (roomates)'],
            ['propiedad' => 'Vivienda social/gubernamental'],
            ['propiedad' => 'Habitacion de hotel o pension'],
            ['propiedad' => 'Otra'],
        ];
        $this->db->table('propiedad_vivienda')->insertBatch($vivienda);

        $ocupaciones = [
            ['ocupacion' => 'Estudiante'],
            ['ocupacion' => 'Empleado a tiempo completo'],
            ['ocupacion' => 'Empleado a tiempo parcial'],
            ['ocupacion' => 'Trabajador independiente / Freelancer'],
            ['ocupacion' => 'Empresario / Dueño de negocio'],
            ['ocupacion' => 'Profesional de la salud (Médico, Enfermero, etc.)'],
            ['ocupacion' => 'Profesor / Educador'],
            ['ocupacion' => 'Artista / Creativo'],
            ['ocupacion' => 'Desempleado'],
            ['ocupacion' => 'Jubilado / Pensionado'],
            ['ocupacion' => 'Trabajador manual / Oficios'],
            ['ocupacion' => 'Técnico / Ingeniero'],
            ['ocupacion' => 'Gerente / Directivo'],
            ['ocupacion' => 'Investigador / Científico'],
            ['ocupacion' => 'Estudiante a tiempo parcial / Trabajador estudiantil'],
            ['ocupacion' => 'Agricultor / Agricultora'],
            ['ocupacion' => 'Servicio al cliente / Atención al cliente'],
            ['ocupacion' => 'Diseñador / Diseñadora'],
            ['ocupacion' => 'Obrero / Obrera'],
            ['ocupacion' => 'Funcionario público / Empleado gubernamental'],
        ];
        $this->db->table('ocupaciones')->insertBatch($ocupaciones);

        $cohabitantes = [
            ['cohabitantes' => 'Familiares (Abuelos, tios, etc.)'],
            ['cohabitantes' => 'Padres'],
            ['cohabitantes' => 'Padre'],
            ['cohabitantes' => 'Madre'],
            ['cohabitantes' => 'Hermanos / Hermanas'],
            ['cohabitantes' => 'Primos'],
            ['cohabitantes' => 'Roommates / Compañeros de cuarto'],
            ['cohabitantes' => 'Pareja / Cónyuge'],
            ['cohabitantes' => 'Amigos / Amigas'],
            ['cohabitantes' => 'Solo yo'],
            ['cohabitantes' => 'Mascotas'],
            ['cohabitantes' => 'Parientes'],
            ['cohabitantes' => 'Compañeros de trabajo'],
            ['cohabitantes' => 'Vecinos'],
            ['cohabitantes' => 'Otros cohabitantes'],
        ];
        $this->db->table('cohabitantes')->insertBatch($cohabitantes);
    }
}
