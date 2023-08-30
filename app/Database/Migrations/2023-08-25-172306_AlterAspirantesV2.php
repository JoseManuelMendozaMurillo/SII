<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterAspirantesV2 extends Migration
{
    public function up()
    {
        $sqlFilePath = __DIR__ . '/sql_migrations/2023-05-25_AlterAspirantesV2P1.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $sqlFilePath = __DIR__ . '/sql_migrations/2023-05-25_AlterAspirantesV2P2.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $sqlFilePath = __DIR__ . '/sql_migrations/2023-05-25_AlterAspirantesV2P3.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $sqlFilePath = __DIR__ . '/sql_migrations/2023-05-25_AlterAspirantesV2P4.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $sqlFilePath = __DIR__ . '/sql_rollback/2023-05-25_AlterAspirantesV2P1.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $sqlFilePath = __DIR__ . '/sql_rollback/2023-05-25_AlterAspirantesV2P2.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $sqlFilePath = __DIR__ . '/sql_rollback/2023-05-25_AlterAspirantesV2P3.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $sqlFilePath = __DIR__ . '/sql_rollback/2023-05-25_AlterAspirantesV2P4.sql';
        $sqlFileContent = file_get_contents($sqlFilePath);
        $this->db->query($sqlFileContent);
        $this->db->enableForeignKeyChecks();
    }
}
