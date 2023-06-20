<?php

namespace App\Controllers\Auth;

use Acme\Themes\Traits\Themeable;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;

class Login extends ShieldLogin {

    protected function view(string $view, array $data = [], array $options = []): string
    {
        $view = str_replace('\App\Views\\', '', $view);
        return $this->twig->render($view, $data, $options);
    }

}