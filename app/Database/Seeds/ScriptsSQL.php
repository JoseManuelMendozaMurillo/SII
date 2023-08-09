<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ScriptsSQL extends Seeder
{
    public function run()
    {
        $sqlFilePath = 'new_insercion.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
    }
}
