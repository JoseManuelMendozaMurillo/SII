<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InformacionBancaria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_banco' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true, ],
            'banco' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
            'sucursal' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
            'cuenta' => [
                'type' => 'VARCHAR',
                'constraint' => 255, ],
            'rfc' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null, ],
            'costo_semestre' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, ],
            'costo_examen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, ],
            'costo_constancias' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, ],
            'costo_verano' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, ],
        ]);
        $this->forge->addKey('id_banco', true);
        $this->forge->createTable('informacion_bancaria');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('informacion_bancaria');
        $this->db->enableForeignKeyChecks();
    }
}
