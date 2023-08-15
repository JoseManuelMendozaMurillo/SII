<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InicializarDatos extends Seeder
{
    public function run()
    {
        $this->call('LlenadoReticulas');
        $this->call('LlenadoInfoBancaria');
        $this->call('LlenadoSelectorasAspirantes');
    }
}
