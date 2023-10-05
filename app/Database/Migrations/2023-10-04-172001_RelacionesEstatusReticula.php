<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RelacionesEstatusReticula extends Migration
{
    public function up()
    {
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-04_RelacionesEstatusReticula_Materias.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-04_RelacionesEstatusReticula_Especialidades.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-04_RelacionesEstatusReticula_Carreras.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_migrations/2023-10-04_RelacionesEstatusReticula_Reticulas.sql'));
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-04_RelacionesEstatusReticula_Materias.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-04_RelacionesEstatusReticula_Especialidades.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-04_RelacionesEstatusReticula_Carreras.sql'));
        $this->db->query(file_get_contents(__DIR__ . '/sql_rollback/2023-10-04_RelacionesEstatusReticula_Reticulas.sql'));

        $this->db->enableForeignKeyChecks();
    }
}
