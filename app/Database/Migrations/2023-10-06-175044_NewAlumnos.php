<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NewAlumnos extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-06_NewAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-06_CambioNombreDatosC.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-06_RelacionNewAlumnos.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-06_RelacionNewAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-06_NewAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-06_CambioNombreDatosC.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
