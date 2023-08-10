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
    }
}
