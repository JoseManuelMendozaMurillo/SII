<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use App\Validations\Aspirantes\RegisterFormAspirantes;
use App\Validations\Reticulas\AsignaturaValidation;
use App\Validations\Reticulas\CarreraValidation;
use App\Validations\Reticulas\EspecialidadValidation;
use App\Validations\Reticulas\ReticulaValidation;
use App\Validations\CustomRules;
use App\Validations\Reticulas\CustomRulesReticulas;

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
        // Reglas personalizadas para reticulas
        CustomRulesReticulas::class,
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

    /* Reticulas */
    // Asignaturas
    public $asignatura;
    public $requestGetByCarrera;
    public $requestGetByEspecialidad;
    public $requestGetByClave;

    // Carreras
    public $carrera;

    // Especialidades
    public $especialidad;

    // Reticulas
    public $reticula;
    public $existReticula;
    public $requestDeleteReticula;
    public $requestPublishReticula;
    public $requestSaveJsonReticula;
    public $requestGetReticulaJson;

    public function __construct()
    {
        parent::__construct();

        // Aspirantes
        $this->registerFormAspirantes = (new RegisterFormAspirantes())->rulesRegisterFormAspirante;
        $this->rulesChageStatusPaymentAspirante = (new RegisterFormAspirantes())->rulesChageStatusPaymentAspirante;

        // Reticulas
        $this->asignatura = (new AsignaturaValidation())->rules;
        $this->requestGetByCarrera = (new AsignaturaValidation())->requestGetByCarrera;
        $this->requestGetByEspecialidad = (new AsignaturaValidation())->requestGetByEspecialidad;
        $this->requestGetByClave = (new AsignaturaValidation())->requestGetByClave;
        $this->carrera = (new CarreraValidation())->rules;
        $this->especialidad = (new EspecialidadValidation())->rules;
        $this->reticula = (new ReticulaValidation())->rules;
        $this->existReticula = (new ReticulaValidation())->existReticula;
        $this->requestPublishReticula = (new ReticulaValidation())->requestPublishReticula;
        $this->requestDeleteReticula = (new ReticulaValidation())->requestDeleteReticula;
        $this->requestSaveJsonReticula = (new ReticulaValidation())->requestSaveJsonReticula;
        $this->requestGetReticulaJson = (new ReticulaValidation())->requestGetReticulaJson;
    }
}
