<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RefactorReticulasV2 extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_AlterAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_AlterAsignaturas.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_PDatosC.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_PFisico.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_AlterEspecialidad.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_AlterCarreras.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-08-30_CreateTablePersonal.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-11_RefactorReticulasV2_NewPersonal.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_AlterAlumnos.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_AlterAsignaturas.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_PDatosC.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_PFisico.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_AlterEspecialidad.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_AlterCarreras.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-11_RefactorReticulasV2_NewPersonal.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-08-30_CreateTablePersonal.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
