<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LimpiaVistas extends Seeder
{
    public function run()
    {
        $query = $this->db->query('SELECT table_name FROM information_schema.tables WHERE table_type = "VIEW" AND table_schema = "sii_test";');

        foreach ($query->getResult() as $row) {
            $name = $row->TABLE_NAME;
            $this->db->query(
                'drop view ' . $name . ';'
            );
        }
    }
}
