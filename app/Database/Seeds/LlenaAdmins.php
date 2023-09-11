<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class LlenaAdmins extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();
        //superadmin
        $user = new User([
            'username' => 'superadmin',
            'email' => 'superadmin@itocotlan.com',
            'password' => 'SII-ruta@correcaminos123',
        ]);
        $users->save($user);
        $insertID = $users->getInsertID();
        $user = $users->findById($insertID);
        $user->addGroup('superadmin');
        //recursos_financieros
        $user = new User([
            'username' => 'recursos_financieros',
            'email' => 'recursos_financieros@itocotlan.com',
            'password' => 'SII-ruta@correcaminos123',
        ]);
        $users->save($user);
        $insertID = $users->getInsertID();
        $user = $users->findById($insertID);
        $user->addGroup('recursos_financieros');
        //desarrollo_academico
        $user = new User([
            'username' => 'desarrollo_academico',
            'email' => 'desarrollo_academico@itocotlan.com',
            'password' => 'SII-ruta@correcaminos123',
        ]);
        $users->save($user);
        $insertID = $users->getInsertID();
        $user = $users->findById($insertID);
        $user->addGroup('desarrollo_academico');
        //servicios_escolares
        $user = new User([
            'username' => 'servicios_escolares',
            'email' => 'servicios_escolares@itocotlan.com',
            'password' => 'SII-ruta@correcaminos123',
        ]);
        $users->save($user);
        $insertID = $users->getInsertID();
        $user = $users->findById($insertID);
        $user->addGroup('servicios_escolares');
    }
}
