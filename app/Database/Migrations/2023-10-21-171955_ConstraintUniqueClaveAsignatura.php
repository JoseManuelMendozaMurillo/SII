<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConstraintUniqueClaveAsignatura extends Migration
{
    //2023-10-21_ConstraintUniqueClaveAsignatura

    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-21_ConstraintUniqueClaveAsignatura.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-21_ConstraintUniqueClaveAsignatura.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
