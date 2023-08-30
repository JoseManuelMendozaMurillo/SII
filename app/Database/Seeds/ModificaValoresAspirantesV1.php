<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ModificaValoresAspirantesV1 extends Seeder
{
    public function run()
    {
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/O_Negativo.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/InsertComInd.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/AgregaNinComInd.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/UpdateHuichol.sql'));

        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/InsertLenInd.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/AgregaNinLenInd.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsUpdateSelectoras/UpdateNahLenInd.sql'));
    }
}
