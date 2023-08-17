<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InicializaAspirantes extends Seeder
{
    public function run()
    {
        $this->call('CompletadoSelectoras');
        $this->call('LlenaEstadoCivil');
        $this->call('LlenaAspirantes');
    }
}
