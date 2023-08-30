<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RefactorAspirantes extends Seeder
{
    public function run()
    {
        $this->call('LimpiaTablasAspirantes');
        $this->call('LlenaAdmins');
        $this->call('NuevosAspirantes');
    }
}
