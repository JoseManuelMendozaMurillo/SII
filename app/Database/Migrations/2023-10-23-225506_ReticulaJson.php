<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReticulaJson extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-23_ReticulaJson.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-23_ReticulaJson.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
