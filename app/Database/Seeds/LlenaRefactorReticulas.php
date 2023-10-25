<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaRefactorReticulas extends Seeder
{
    public function run()
    {
        $this->call('LlenaEstatusReticulas');
        $this->call('LlenaTablasReticulasEstatus');
    }
}
