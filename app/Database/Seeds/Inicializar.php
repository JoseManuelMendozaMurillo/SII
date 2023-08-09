<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Inicializar extends Seeder
{
    public function run()
    {
        $this->call('LlenadoSelectorasAspirantes');
        $this->call('ScriptsSQL');
    }
}
