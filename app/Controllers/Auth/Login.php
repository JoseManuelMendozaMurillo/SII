<?php

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Config\Auth;
use Exception;

class Login extends ShieldLogin
{
    protected function view(string $view, array $data = [], array $options = []): string
    {
        $view = str_replace('\App\Views\\', '', $view);

        return $this->twig->render($view, $data, $options);
    }

    public function loginAction(): RedirectResponse
    {
        // Se deben ajustar las reglas para el inicio de sesion de los aspirantes
        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        // $rules = $this->getValidationRules();

        // if (!$this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        /** @var array $credentials */
        $credentials = $this->request->getPost(setting('Auth.validFields')) ?? [];
        $credentials = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if ($result->isOK()) {
            return redirect()->to(config(Auth::class)->loginRedirect())->withCookies();
        } else {
            $error_message = 'Credenciales inválidas. Por favor, verifica tu correo y contraseña.';

            return redirect()->route('auth/login')->withInput()->with('error', $result->reason(), $error_message);
        }

        // If an action has been defined for login, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show')->withCookies();
        }

        if (auth()->user()->requiresPasswordReset()) {
            return redirect()->route('auth/passwordreset');
        }

        return redirect()->to(config(Auth::class)->loginRedirect())->withCookies();
    }

    public function passwordResetView()
    {
    }

    public function passwordReset()
    {
        $password = $this->request->getPost('password');

        try {
            $users = auth()->getProvider();
            $user = auth()->user();
            $user->fill([

                'password' => $password,
            ]);
            $users->save($user);
            $user->undoForcePasswordReset();

            auth()->logout();
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return redirect()->to('auth/login');
    }
}
