<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JsonReticulas extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-20_JsonReticulas.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-20_JsonReticulas.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
