<?php

/**
 * Alteracion de la tabla settings
 * Esta migracion fue copiada de la siguiente direccion:
 * vendor/codeigniter4/settings/src/Database/Migrations/2021-11-14-143905_AddContextColumn.php
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;
use CodeIgniter\Settings\Config\Settings;

class AddContextColumn extends Migration
{
    private Settings $config;

    public function __construct(?Forge $forge = null)
    {
        $this->config = config('Settings');
        $this->DBGroup = $this->config->database['group'] ?? null;

        parent::__construct($forge);
    }

    public function up()
    {
        $this->forge->addColumn($this->config->database['table'], [
            'context' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => true,
                'after' => 'type',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn($this->config->database['table'], 'context');
    }
}
