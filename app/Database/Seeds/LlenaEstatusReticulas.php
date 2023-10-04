<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaEstatusReticulas extends Seeder
{
    public function run()
    {
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsReticulas/insert_estatusret.sql'));
    }
}
