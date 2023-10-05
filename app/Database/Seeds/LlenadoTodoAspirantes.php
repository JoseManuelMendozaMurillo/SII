<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenadoTodoAspirantes extends Seeder
{
    public function run()
    {
        $this->call('InicializarDatos');
        $this->call('InicializaAspirantes');
        $this->call('ModificaValoresAspirantesV1');
        $this->call('RefactorAspirantes');
    }
}
