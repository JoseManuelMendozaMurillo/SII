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

/* Test/PruebasCurl.twig.html */
class __TwigTemplate_33a65631377e007188631f06e36e4161 extends Template
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
    <title>Prueba curl</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ\" crossorigin=\"anonymous\">
  </head>
  <body class=\"vh-100 bg-dark\">

    <div class=\"container-fluid\">
        <div class=\"container p-3\">
            
            <h1 class=\"text-center text-white\">Buscar pokemon</h1>
            
            <div class=\"d-";
        // line 16
        echo ((($context["alert"] ?? null)) ? ("block") : ("none"));
        echo " alert alert-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["alert"] ?? null), "type", [], "any", false, false, false, 16), "html", null, true);
        echo " alert-dismissible fade show\" role=\"alert\">
                ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["alert"] ?? null), "text", [], "any", false, false, false, 17), "html", null, true);
        echo "
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>
            
            <form action=\"";
        // line 21
        echo twig_escape_filter($this->env, base_url("pruebas/getPokemon"), "html", null, true);
        echo "\" id=\"form\" name=\"form\" class=\"row\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"mb-3\">
                  <label for=\"correo\" class=\"form-label\">Nombre del pokemon</label>
                  <input type=\"text\" class=\"form-control\" id=\"pokemonName\" name=\"pokemonName\" placeholder=\"nombre pokemon\">
                </div>
                <button type=\"submit\" class=\"col-2 m-auto btn btn-primary\" id=\"btnEnviar\" name=\"btnEnviar\">Buscar</button>
            </form>

            <div class=\"";
        // line 29
        echo ((array_key_exists("id", $context)) ? ("d-block") : ("d-none"));
        echo " d-flex justify-content-center align-items-center mt-4\">
                <div class=\"card\" style=\"width: 18rem;\">
                    <img src=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["images"] ?? null), "front", [], "any", false, false, false, 31), "html", null, true);
        echo "\" class=\"card-img-top w-50 m-auto\" alt=\"imagen del pokemon\">
                    <div class=\"card-body p-0\">
                      <h5 class=\"card-title text-center\">";
        // line 33
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</h5>
                    </div>
                    <ul class=\"list-group list-group-flush\">
                      <li class=\"list-group-item\">Experiencia: ";
        // line 36
        echo twig_escape_filter($this->env, ($context["experience"] ?? null), "html", null, true);
        echo "</li>
                      <li class=\"list-group-item\">Vida: ";
        // line 37
        echo twig_escape_filter($this->env, ($context["life"] ?? null), "html", null, true);
        echo "</li>
                      <li class=\"list-group-item\">Ataque: ";
        // line 38
        echo twig_escape_filter($this->env, ($context["attack"] ?? null), "html", null, true);
        echo "</li>
                      <li class=\"list-group-item\">defense: ";
        // line 39
        echo twig_escape_filter($this->env, ($context["defense"] ?? null), "html", null, true);
        echo "</li>
                    </ul>
                  </div>
            </div>

        </div>
    </div>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe\" crossorigin=\"anonymous\"></script>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "Test/PruebasCurl.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 39,  102 => 38,  98 => 37,  94 => 36,  88 => 33,  83 => 31,  78 => 29,  67 => 21,  60 => 17,  54 => 16,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"es\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Prueba curl</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ\" crossorigin=\"anonymous\">
  </head>
  <body class=\"vh-100 bg-dark\">

    <div class=\"container-fluid\">
        <div class=\"container p-3\">
            
            <h1 class=\"text-center text-white\">Buscar pokemon</h1>
            
            <div class=\"d-{{alert ? 'block' : 'none'}} alert alert-{{alert.type}} alert-dismissible fade show\" role=\"alert\">
                {{alert.text}}
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>
            
            <form action=\"{{base_url('pruebas/getPokemon')}}\" id=\"form\" name=\"form\" class=\"row\" method=\"post\" enctype=\"multipart/form-data\">
                <div class=\"mb-3\">
                  <label for=\"correo\" class=\"form-label\">Nombre del pokemon</label>
                  <input type=\"text\" class=\"form-control\" id=\"pokemonName\" name=\"pokemonName\" placeholder=\"nombre pokemon\">
                </div>
                <button type=\"submit\" class=\"col-2 m-auto btn btn-primary\" id=\"btnEnviar\" name=\"btnEnviar\">Buscar</button>
            </form>

            <div class=\"{{ id is defined ? 'd-block' : 'd-none'}} d-flex justify-content-center align-items-center mt-4\">
                <div class=\"card\" style=\"width: 18rem;\">
                    <img src=\"{{images.front}}\" class=\"card-img-top w-50 m-auto\" alt=\"imagen del pokemon\">
                    <div class=\"card-body p-0\">
                      <h5 class=\"card-title text-center\">{{name}}</h5>
                    </div>
                    <ul class=\"list-group list-group-flush\">
                      <li class=\"list-group-item\">Experiencia: {{experience}}</li>
                      <li class=\"list-group-item\">Vida: {{life}}</li>
                      <li class=\"list-group-item\">Ataque: {{attack}}</li>
                      <li class=\"list-group-item\">defense: {{defense}}</li>
                    </ul>
                  </div>
            </div>

        </div>
    </div>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe\" crossorigin=\"anonymous\"></script>
  </body>
</html>", "Test/PruebasCurl.twig.html", "/var/www/html/app/Views/Test/PruebasCurl.twig.html");
    }
}
