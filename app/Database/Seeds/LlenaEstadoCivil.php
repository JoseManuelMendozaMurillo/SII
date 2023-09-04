<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaEstadoCivil extends Seeder
{
    public function run()
    {
        $estado_civil = [
            ['estado_civil' => 'Soltero/a'],
            ['estado_civil' => 'Casado/a'],
            ['estado_civil' => 'Conviviendo en pareja'],
            ['estado_civil' => 'Divorciado/a'],
            ['estado_civil' => 'Viudo/a'],
            ['estado_civil' => 'Separado/a'],
            ['estado_civil' => 'Union libre'],
            ['estado_civil' => 'Prefiero no decirlo'],
            ['estado_civil' => 'Otro'],
        ];
        $this->db->table('estado_civil')->insertBatch($estado_civil);
    }
}
