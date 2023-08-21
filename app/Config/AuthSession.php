<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthSession as ShieldAuthSession;

/**
 * Config for Session Authenticator
 */
class AuthSession extends ShieldAuthSession
{
    /**
     * The validation rules for username
     *
     * @var string[]
     */
    public array $usernameValidationRules = [
        'required',
        'max_length[30]',
        'min_length[3]',
        'regex_match[/\A[a-zA-Z0-9_\.]+\z/]',
    ];

    /**
     * The validation rules for email
     *
     * @var string[]
     */
    public array $emailValidationRules = [
        'required',
        'max_length[254]',
        'valid_email',
    ];

    /**
     * Reglas de validacion para el nip
     *
     * @var string[]
     */
    public array $noSolicitudeValidationRules = [
        'required',
        'exact_length[4]',
        'numeric',
    ];
}
