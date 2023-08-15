<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenadoInfoBancaria extends Seeder
{
    public function run()
    {
        //No jalo el seeder normal
        $sqlFilePath = __DIR__ . '/ScripInfoBancaria/insert_infobancaria.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
    }
}
