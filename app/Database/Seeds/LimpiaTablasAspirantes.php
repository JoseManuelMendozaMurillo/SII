<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LimpiaTablasAspirantes extends Seeder
{
    public function run()
    {
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/DesactivaFKC.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/TruncateUsers.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/TruncateAspirantes.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/TruncateAspirantesDatosC.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/TruncateAuthIdentities.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/TruncateAuthGroupsUsers.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/ScriptsLimpiarShieldAspirantes/DesactivaFKC.sql'));
    }
}
