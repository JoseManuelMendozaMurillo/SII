<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaSS extends Seeder
{
    public function run()
    {
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsReticulas/insert_SS.sql'));
    }
}
