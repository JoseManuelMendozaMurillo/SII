<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablasSelectorasAspirantes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tipo_sangre' => [
                'type' => 'INT',
                'constraint' => 2,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tipo' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
            ],
        ]);
        $this->forge->addKey('id_tipo_sangre', true);
        $this->forge->createTable('tipos_sangre');

        $this->forge->addField([
            'id_motivo_ingreso' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'motivo' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_motivo_ingreso', true);
        $this->forge->createTable('motivos_ingreso');

        $this->forge->addField([
            'id_lengua_indigena' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'lengua' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_lengua_indigena', true);
        $this->forge->createTable('lenguas_indigenas');

        $this->forge->addField([
            'id_tipo_piso' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'tipo_piso' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_tipo_piso', true);
        $this->forge->createTable('tipos_piso');

        $this->forge->addField([
            'id_propiedad_vivienda' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'propiedad' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_propiedad_vivienda', true);
        $this->forge->createTable('propiedad_vivienda');

        $this->forge->addField([
            'id_ocupacion' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'ocupacion' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_ocupacion', true);
        $this->forge->createTable('ocupaciones');

        $this->forge->addField([
            'id_cohabitante' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'cohabitantes' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_cohabitante', true);
        $this->forge->createTable('cohabitantes');

        $this->forge->addField([
            'id_nivel_estudio' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'nivel' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_nivel_estudio', true);
        $this->forge->createTable('nivel_estudios');

        $this->forge->addField([
            'id_comunidad_indigena' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'comunidad' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
        ]);
        $this->forge->addKey('id_comunidad_indigena', true);
        $this->forge->createTable('comunidades_indigenas');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('tipos_sangre');
        $this->forge->dropTable('motivos_ingreso');
        $this->forge->dropTable('lenguas_indigenas');
        $this->forge->dropTable('tipos_piso');
        $this->forge->dropTable('propiedad_vivienda');
        $this->forge->dropTable('ocupaciones');
        $this->forge->dropTable('cohabitantes');
        $this->forge->dropTable('nivel_estudios');
        $this->forge->dropTable('comunidades_indigenas');
        $this->db->enableForeignKeyChecks();
    }
}
