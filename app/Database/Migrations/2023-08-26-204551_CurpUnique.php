<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CurpUnique extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-05-25_CurpUnique.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-05-25_CurpUnique.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
