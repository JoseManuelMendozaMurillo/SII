<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ScriptsSQL extends Seeder
{
    public function run()
    {
        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_tipo_asignatura.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_nivel_escolar.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_carreras.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_especialidades.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_asignaturas.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_asignaturas_carrera.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_especialidades.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/ScriptsReticulas/insert_reticulas.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
    }
}
