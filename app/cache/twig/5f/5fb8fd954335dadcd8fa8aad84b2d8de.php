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

/* Test/PruebasCorreo.twig.html */
class __TwigTemplate_086f0065fb7068b0a75bbaf7501fb8ce extends Template
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
        echo "<!doctype html>
<html lang=\"es\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Prueba correos</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ\" crossorigin=\"anonymous\">
  </head>
  <body class=\"vh-100 bg-dark\">
    <div class=\"container-fluid\">
       
        <div class=\"container p-3\">
            <h1 class=\"text-center text-white\">Enviar correo</h1>
            <form action=\"";
        // line 14
        echo twig_escape_filter($this->env, base_url("pruebas/sendEmail"), "html", null, true);
        echo "\" id=\"form\" name=\"form\" class=\"row\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"mb-3\">
                  <label for=\"correo\" class=\"form-label\">Ingresa el correo de destino</label>
                  <input type=\"email\" class=\"form-control\" id=\"correo\" name=\"correo\" placeholder=\"name@example.com\">
                </div>
                <button type=\"submit\" class=\"col-2 m-auto btn btn-primary\" id=\"btnEnviar\" name=\"btnEnviar\">Enviar</button>
            </form>
        </div>

    </div>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe\" crossorigin=\"anonymous\"></script>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "Test/PruebasCorreo.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 14,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"es\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Prueba correos</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ\" crossorigin=\"anonymous\">
  </head>
  <body class=\"vh-100 bg-dark\">
    <div class=\"container-fluid\">
       
        <div class=\"container p-3\">
            <h1 class=\"text-center text-white\">Enviar correo</h1>
            <form action=\"{{base_url('pruebas/sendEmail')}}\" id=\"form\" name=\"form\" class=\"row\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"mb-3\">
                  <label for=\"correo\" class=\"form-label\">Ingresa el correo de destino</label>
                  <input type=\"email\" class=\"form-control\" id=\"correo\" name=\"correo\" placeholder=\"name@example.com\">
                </div>
                <button type=\"submit\" class=\"col-2 m-auto btn btn-primary\" id=\"btnEnviar\" name=\"btnEnviar\">Enviar</button>
            </form>
        </div>

    </div>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe\" crossorigin=\"anonymous\"></script>
  </body>
</html>", "Test/PruebasCorreo.twig.html", "/var/www/html/app/Views/Test/PruebasCorreo.twig.html");
    }
}
