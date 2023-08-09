<?php

namespace App\Controllers\Aspirantes;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;

class Aspirantes extends BaseController
{
    public function aspirantes()
    {
        $this->twig->display('Aspirantes/aspirantes');
    }

    public function hello()
    {
        echo 'Hola, aspirante';
    }

    public function new()
    {
        $users = model('UserModel');
        $user = new User([
            'username' => 'foo-bar',
            'email' => 'foo.bar@example.com',
            'password' => 'secret plain text password',
        ]);
        // $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById(0);

        // // Add to default group
        // $users->addGroup('aspirante');

        echo d($user);
    }
}
