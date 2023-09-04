<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePersonal extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-08-30_CreateTablePersonal.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-08-30_CreateTablePersonalFisico.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-08-30_CreateTablePersonalDatosC.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-08-30_CreateTablePersonal.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-08-30_CreateTablePersonalFisico.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-08-30_CreateTablePersonalDatosC.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
