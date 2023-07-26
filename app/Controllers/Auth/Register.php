<?php

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;
use CodeIgniter\Events\Events;
use App\Config\Auth;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\HTTP\RedirectResponse;

class Register extends ShieldRegister
{
    protected function view(string $view, array $data = [], array $options = []): string
    {
        $view = str_replace('\App\Views\\', '', $view);

        return $this->twig->render($view, $data, $options);
    }

    public function registerAction(): RedirectResponse
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config(Auth::class)->registerRedirect());
        }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
            ->with('error', lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (!$this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_keys($rules);
        $user = $this->getUserEntity();
        $user->fill($this->request->getPost($allowedPostFields));

        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Agregamos al usuario al grupo que haya elegido
        $role = $this->request->getPost('role');
        $this->addGroup($role, $user, $users);

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->startLogin($user);

        // If an action has been defined for register, start it up.
        $hasAction = $authenticator->startUpAction('register', $user);
        if ($hasAction) {
            return redirect()->to('auth/a/show');
        }

        // Set the user active
        $user->activate();

        $authenticator->completeLogin($user);

        // Success!
        return redirect()->to(config(Auth::class)->registerRedirect())
            ->with('message', lang('Auth.registerSuccess'));
    }

    protected function addGroup($role, $user, $users)
    {
        switch ($role) {
            case '1':
                $user->addGroup('superadmin');

                break;

            case '2':
                $user->addGroup('bossdepartment');

                break;

            case '3':
                $user->addGroup('master');

                break;

            case '4':
                $user->addGroup('student');

                break;

            default:
                $users->addToDefaultGroup($user);

                break;
        }
    }
}
