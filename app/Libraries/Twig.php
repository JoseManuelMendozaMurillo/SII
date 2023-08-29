<?php

namespace App\Libraries;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFunction;

class Twig
{
    private $config = [];
    private $twig;
    private $paths;
    private $loader;
    private $functions_added = false;
    private $functions_asis = [
        'base_url',
    ];
    private $functions_safe = [
        'form_open', 'form_close', 'form_error', 'form_hidden', 'set_value', 'validation_errors', 'config_item',
        'form_open_multipart', 'form_upload', 'form_submit', 'form_dropdown',
        'set_radio', 'field_has_been_validated', 'report_detail_activity',
        'session', 'd', 'dd', 'auth', 'route_to', 'site_url',
    ];

    public function __construct($params = [])
    {
        $this->config = array_merge($this->config, $params);

        if (isset($params['functions'])) {
            $this->functions_asis =
                array_unique(
                    array_merge($this->functions_asis, $params['functions'])
                );
        }

        if (isset($params['functions_safe'])) {
            $this->functions_safe =
                array_unique(
                    array_merge($this->functions_safe, $params['functions_safe'])
                );
        }

        if (isset($params['paths'])) {
            $this->paths = $params['paths'];
            unset($params['paths']);
        } else {
            $this->paths = [APPPATH . 'Views/'];
        }

        // default config
        $this->config = [
            'cache' => APPPATH . 'cache/twig',
            'debug' => ENVIRONMENT !== 'production',
            'auto_reload' => true,
            'paths' => $this->paths,
        ];
    }

    protected function resetTwig()
    {
        $this->twig = null;
        $this->createTwig();
    }

    protected function createTwig()
    {
        if ($this->twig !== null) {
            return;
        }

        if (ENVIRONMENT === 'production') {
            $debug = false;
        } else {
            $debug = true;
        }

        if ($this->loader === null) {
            $this->loader = new FilesystemLoader($this->paths);
        }

        // config
        $this->config = [
            'cache' => APPPATH . 'cache/twig',
            'debug' => $debug,
            'auto_reload' => true,
            'paths' => $this->paths,
        ];

        $twig = new Environment($this->loader, $this->config);

        if ($debug) {
            $twig->addExtension(new DebugExtension());
        }

        $this->twig = $twig;
    }

    protected function setLoader($loader)
    {
        $this->loader = $loader;
    }

    /**
     * Registers a Global
     *
     * @param string $name  The global name
     * @param mixed  $value The global value
     */
    public function addGlobal($name, $value)
    {
        $this->createTwig();
        $this->twig->addGlobal($name, $value);
    }

    /**
     * Renders Twig Template and Set Output
     *
     * @param string $view   Template filename without `.twig`
     * @param array  $params Array of parameters to pass to the template
     */
    public function display($view, $params = [])
    {
        echo $this->render($view, $params);
    }

    /**
     * Renders Twig Template and Returns as String
     *
     * @param string $view   Template filename without `.twig`
     * @param array  $params Array of parameters to pass to the template
     *
     * @return string
     */
    public function render($view, $params = [])
    {
        $this->createTwig();

        $this->addFunctions();

        //Verifica la extensión del archivo de plantilla
        $view = $view . '.twig.html';

        return $this->twig->render($view, $params);
    }

    protected function addFunctions()
    {
        // Runs only once
        if ($this->functions_added) {
            return;
        }

        // as is functions
        foreach ($this->functions_asis as $function) {
            if (function_exists($function)) {
                $this->twig->addFunction(
                    new TwigFunction(
                        $function,
                        $function
                    )
                );
            }
        }

        // safe functions
        foreach ($this->functions_safe as $function) {
            if (function_exists($function)) {
                $this->twig->addFunction(
                    new TwigFunction(
                        $function,
                        $function,
                        ['is_safe' => ['html']]
                    )
                );
            }
        }

        // customized functions
        if (function_exists('anchor')) {
            $this->twig->addFunction(
                new TwigFunction(
                    'anchor',
                    [$this, 'safeAnchor'],
                    ['is_safe' => ['html']]
                )
            );
        }

        $this->functions_added = true;
    }

    /**
     * @param string $uri
     * @param string $title
     * @param array  $attributes [changed] only array is acceptable
     *
     * @return string
     */
    public function safeAnchor($uri = '', $title = '', $attributes = [])
    {
        helper('html');  // Carga el helper HTML

        $uri = esc($uri);
        $title = esc($title);

        $new_attr = [];

        foreach ($attributes as $key => $val) {
            $new_attr[esc($key)] = esc($val);
        }

        return anchor($uri, $title, $new_attr);
    }

    /**
     * @return Environment
     */
    public function getTwig()
    {
        $this->createTwig();

        return $this->twig;
    }
}
