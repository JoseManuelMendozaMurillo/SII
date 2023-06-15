<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Correos/Test.twig.html */
class __TwigTemplate_188d7cfd00910f3de917c5912c10ab99 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div
\tstyle=\"
\t\twidth: 70%;
\t\theight: auto;
\t\tbackground-color: #f4f4f4;
\t\tmargin: 0 auto;
\t\tpadding: 30px;
\t\tborder-top: 2px solid #ffb73f;
\t\tborder-radius: 3px;
\t\"
\tclass=\"contenedor\"
>
\t<div style=\"text-align: center\" class=\"body\">
\t\t<h2 style=\"font-family: sans-serif; font-weight: bold\">
\t\t\tEste es un correo de ejemplo
\t\t</h2>
\t\t<small style=\"font-family: sans-serif\">
\t\t\tDirección de correo: ";
        // line 18
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "
\t\t</small>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "Correos/Test.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div
\tstyle=\"
\t\twidth: 70%;
\t\theight: auto;
\t\tbackground-color: #f4f4f4;
\t\tmargin: 0 auto;
\t\tpadding: 30px;
\t\tborder-top: 2px solid #ffb73f;
\t\tborder-radius: 3px;
\t\"
\tclass=\"contenedor\"
>
\t<div style=\"text-align: center\" class=\"body\">
\t\t<h2 style=\"font-family: sans-serif; font-weight: bold\">
\t\t\tEste es un correo de ejemplo
\t\t</h2>
\t\t<small style=\"font-family: sans-serif\">
\t\t\tDirección de correo: {{email}}
\t\t</small>
\t</div>
</div>
", "Correos/Test.twig.html", "/var/www/html/app/Views/Correos/Test.twig.html");
    }
}
