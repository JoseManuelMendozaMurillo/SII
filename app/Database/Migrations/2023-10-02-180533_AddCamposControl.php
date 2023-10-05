<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCamposControl extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-02_AddCamposControl_AsignaturasCarrera.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-02_AddCamposControl_AsignaturasEspecialidad.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-02_AddCamposControl_NivelEscolar.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-02_AddCamposControl_TipoAsignatura.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-02_AddCamposControl_AsignaturasCarrera.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-02_AddCamposControl_AsignaturasEspecialidad.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-02_AddCamposControl_NivelEscolar.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-02_AddCamposControl_TipoAsignatura.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
