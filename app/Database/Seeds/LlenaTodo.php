<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaTodo extends Seeder
{
    public function run()
    {
        $this->call('LimpiaVistas');
        $this->call('LlenadoTodoAspirantes');
        $this->call('LlenaRefactorReticulas');
        $this->call('CreaVistasReticulas');
        $this->call('LlenaSS');
    }
}
