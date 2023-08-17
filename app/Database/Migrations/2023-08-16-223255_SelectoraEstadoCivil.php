<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SelectoraEstadoCivil extends Migration
{
    public function up()
    {
        $sqlFilePath = __DIR__ . '/sql_migrations/estado_civil_2023-08-16.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/sql_migrations/alter_aspirantes_estado_civil_2023-08-16.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $sqlFilePath = __DIR__ . '/sql_rollback/alter_aspirantes_estado_civil_2023-08-16.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);

        $sqlFilePath = __DIR__ . '/sql_rollback/estado_civil_2023-08-16.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $this->db->enableForeignKeyChecks();
    }
}
