<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use App\Validations\Aspirantes\RegisterFormAspirantes;
use App\Validations\CustomRules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        // Reglas personalizadas
        CustomRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Grupos de reglas
    // --------------------------------------------------------------------

    /* Aspirantes */
    public $registerFormAspirantes;
    public $rulesChageStatusPaymentAspirante;

    public function __construct()
    {
        parent::__construct();
        $this->registerFormAspirantes = (new RegisterFormAspirantes())->rulesRegisterFormAspirante;
        $this->rulesChageStatusPaymentAspirante = (new RegisterFormAspirantes())->rulesChageStatusPaymentAspirante;
    }
}
