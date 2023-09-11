<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlteInfoBancaria extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-08-27_AlterInfoBancaria.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-08-27_AlterInfoBancaria.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
