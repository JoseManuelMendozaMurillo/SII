<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePeriodos extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-08-30_CreateTablePeriodos.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-08-30_CreateTablePeriodos.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
