<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterAspirantesV1 extends Migration
{
    public function up()
    {
        $sqlFilePath = __DIR__ . '/sql_migrations/alter_aspirantes_2023-08-15.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $sqlFilePath = __DIR__ . '/sql_rollback/alter_aspirantes_2023-08-15.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $this->db->enableForeignKeyChecks();
    }
}
