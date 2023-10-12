<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RefactorAlumnos extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-09-04-164738_AlterTableAlumnosIA.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-09-04-164738_AlterTableAlumnosIP.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-09-04-164738_CreateTableAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-09-04-164738_CreateTableAlumnosIP.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-09-04-164738_CreateTableAlumnosIA.sql'));

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-09-04-164738_CreateTableAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-09-04-164738_CreateTableAlumnosIP.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-09-04-164738_CreateTableAlumnosIA.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-09-04-164738_AlterTableAlumnosIA.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-09-04-164738_AlterTableAlumnosIP.sql'));
    }
}
