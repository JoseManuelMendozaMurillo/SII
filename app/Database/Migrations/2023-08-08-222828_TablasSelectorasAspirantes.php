<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablasSelectorasAspirantes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('tipos_sangre');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('tipos_sangre');
        $this->db->enableForeignKeyChecks();
    }
}
