<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompletadoSelectoras extends Seeder
{
    public function run()
    {
        $comunidades = [
            ['comunidad' => 'Otra'],
        ];
        $this->db->table('comunidades_indigenas')->insertBatch($comunidades);
        $ocupaciones = [
            ['ocupacion' => 'Otra'],
        ];
        $this->db->table('ocupaciones')->insertBatch($ocupaciones);
    }
}
