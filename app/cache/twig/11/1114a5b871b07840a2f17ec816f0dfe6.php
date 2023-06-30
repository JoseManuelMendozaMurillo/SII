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

/* Auth\login.twig.html */
class __TwigTemplate_c69e7c15c674b6700ff136426779f971 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "Layout/base.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("Layout/base.twig.html", "Auth\\login.twig.html", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Login";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "  <body class=\" \" data-bs-spy=\"scroll\" data-bs-target=\"#elements-section\" data-bs-offset=\"0\" tabindex=\"0\">    
      <div class=\"wrapper\">
      <section class=\"login-content\">
         <div class=\"row m-0 align-items-center bg-white vh-100\">            
            <div class=\"col-md-6\">
               <div class=\"row justify-content-center\">
                  <div class=\"col-md-10\">
                     <div class=\"card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card\">
                        <div class=\"card-body\">
                           <a href=\"#\" class=\"navbar-brand d-flex align-items-center mb-3\">
                              <!--Logo start-->
                              <!--logo End-->
                              
                               <!--Logo start-->
                               <div class=\"logo-main\">
                                 <div class=\"logo-normal\">
                                   <img class=\"icon-40\" src=\"";
        // line 23
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg"), "html", null, true);
        echo "\" alt=\"\" style=\"width: 70px; height: 60px;\">
                                 </div>
                                 <div class=\"logo-mini\">
                                   <img class=\"icon-40\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg"), "html", null, true);
        echo "\" alt=\"\" style=\"width: 70px; height: 60px;\">
                                 </div>
                             </div>
                             <!--logo End-->
                             
                             <h4 class=\"logo-title ms-3\">Tec Ocotlán</h4>
                           </a>
                           <h2 class=\"mb-2 text-center\">Sign In</h2>
                           <p class=\"text-center\">Login to stay connected.</p>
                           <form action=\"";
        // line 35
        echo twig_escape_filter($this->env, base_url("auth/sing-in"), "html", null, true);
        echo "\" enctype=\"multipart/form-data\" method=\"post\">
                              <div class=\"row\">
                                 <div class=\"col-lg-12\">
                                    <div class=\"form-group\">
                                       <label for=\"email\" class=\"form-label\">Email</label>
                                       <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" aria-describedby=\"email\" placeholder=\" \">
                                    </div>
                                 </div>
                                 <div class=\"col-lg-12\">
                                    <div class=\"form-group\">
                                       <label for=\"password\" class=\"form-label\">Password</label>
                                       <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\" aria-describedby=\"password\" placeholder=\" \">
                                    </div>
                                 </div>
                                 <div class=\"col-lg-12 d-flex justify-content-between\">
                                    <div class=\"form-check mb-3\">
                                       <input type=\"checkbox\" class=\"form-check-input\" id=\"customCheck1\">
                                       <label class=\"form-check-label\" for=\"customCheck1\">Remember Me</label>
                                    </div>
                                    <a href=\"#\">Forgot Password?</a>
                                 </div>
                              </div>
                              <div class=\"d-flex justify-content-center\">
                                 <button type=\"submit\" class=\"btn btn-primary\">Sign In</button>
                              </div>
                              <p class=\"text-center my-3\">Follow us on our social media</p>
                              <div class=\"d-flex justify-content-center\">
                                 <ul class=\"list-group list-group-horizontal list-group-flush\">
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"https://www.facebook.com/InstitutoTecnologicodeOcotlan\"><img src=\"";
        // line 64
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/fb.svg"), "html", null, true);
        echo "\" alt=\"fb\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"https://www.instagram.com/tecnmcampusocotlan/#\"><img src=\"";
        // line 67
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/im.svg"), "html", null, true);
        echo "\" alt=\"im\"></a>
                                    </li>
                                 </ul>
                              </div>
                              <p class=\"mt-3 text-center\">
                                 Don’t have an account? <a href=\"";
        // line 72
        echo twig_escape_filter($this->env, base_url("auth/register"), "html", null, true);
        echo "\" class=\"text-underline\">Click here to sign up.</a>
                              </p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class=\"sign-bg\">
                  <svg width=\"280\" height=\"230\" viewBox=\"0 0 431 398\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                     <g opacity=\"0.05\">
                        <rect x=\"0\" y=\"20\" width=\"200\" height=\"60\" rx=\"38.7857\" transform=\"rotate(0 61.9355 138.545)\" fill=\"#3B8AFF\"/>
                        <rect x=\"270\" y=\"-256\" width=\"180\" height=\"60\" rx=\"38.7857\" transform=\"rotate(90 62.3154 -190.173)\" fill=\"#3B8AFF\"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class=\"col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden\">
               <img src=\"";
        // line 89
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/imagenescorrecaminos/logolineastec.svg"), "html", null, true);
        echo "\" class=\"img-fluid gradient-main animated-scaleX p-5\" alt=\"images\">
         </div>
      </section>
      </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>
  ";
    }

    public function getTemplateName()
    {
        return "Auth\\login.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 89,  140 => 72,  132 => 67,  126 => 64,  94 => 35,  82 => 26,  76 => 23,  58 => 7,  54 => 6,  47 => 4,  36 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends \"Layout/base.twig.html\" %}

{% block title %}Login{% endblock %}

{% block body %}
  <body class=\" \" data-bs-spy=\"scroll\" data-bs-target=\"#elements-section\" data-bs-offset=\"0\" tabindex=\"0\">    
      <div class=\"wrapper\">
      <section class=\"login-content\">
         <div class=\"row m-0 align-items-center bg-white vh-100\">            
            <div class=\"col-md-6\">
               <div class=\"row justify-content-center\">
                  <div class=\"col-md-10\">
                     <div class=\"card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card\">
                        <div class=\"card-body\">
                           <a href=\"#\" class=\"navbar-brand d-flex align-items-center mb-3\">
                              <!--Logo start-->
                              <!--logo End-->
                              
                               <!--Logo start-->
                               <div class=\"logo-main\">
                                 <div class=\"logo-normal\">
                                   <img class=\"icon-40\" src=\"{{base_url('Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg')}}\" alt=\"\" style=\"width: 70px; height: 60px;\">
                                 </div>
                                 <div class=\"logo-mini\">
                                   <img class=\"icon-40\" src=\"{{base_url('Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg')}}\" alt=\"\" style=\"width: 70px; height: 60px;\">
                                 </div>
                             </div>
                             <!--logo End-->
                             
                             <h4 class=\"logo-title ms-3\">Tec Ocotlán</h4>
                           </a>
                           <h2 class=\"mb-2 text-center\">Sign In</h2>
                           <p class=\"text-center\">Login to stay connected.</p>
                           <form action=\"{{base_url('auth/sing-in')}}\" enctype=\"multipart/form-data\" method=\"post\">
                              <div class=\"row\">
                                 <div class=\"col-lg-12\">
                                    <div class=\"form-group\">
                                       <label for=\"email\" class=\"form-label\">Email</label>
                                       <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" aria-describedby=\"email\" placeholder=\" \">
                                    </div>
                                 </div>
                                 <div class=\"col-lg-12\">
                                    <div class=\"form-group\">
                                       <label for=\"password\" class=\"form-label\">Password</label>
                                       <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\" aria-describedby=\"password\" placeholder=\" \">
                                    </div>
                                 </div>
                                 <div class=\"col-lg-12 d-flex justify-content-between\">
                                    <div class=\"form-check mb-3\">
                                       <input type=\"checkbox\" class=\"form-check-input\" id=\"customCheck1\">
                                       <label class=\"form-check-label\" for=\"customCheck1\">Remember Me</label>
                                    </div>
                                    <a href=\"#\">Forgot Password?</a>
                                 </div>
                              </div>
                              <div class=\"d-flex justify-content-center\">
                                 <button type=\"submit\" class=\"btn btn-primary\">Sign In</button>
                              </div>
                              <p class=\"text-center my-3\">Follow us on our social media</p>
                              <div class=\"d-flex justify-content-center\">
                                 <ul class=\"list-group list-group-horizontal list-group-flush\">
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"https://www.facebook.com/InstitutoTecnologicodeOcotlan\"><img src=\"{{base_url('Vendor/Template/assets/images/brands/fb.svg')}}\" alt=\"fb\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"https://www.instagram.com/tecnmcampusocotlan/#\"><img src=\"{{base_url('Vendor/Template/assets/images/brands/im.svg')}}\" alt=\"im\"></a>
                                    </li>
                                 </ul>
                              </div>
                              <p class=\"mt-3 text-center\">
                                 Don’t have an account? <a href=\"{{base_url('auth/register')}}\" class=\"text-underline\">Click here to sign up.</a>
                              </p>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class=\"sign-bg\">
                  <svg width=\"280\" height=\"230\" viewBox=\"0 0 431 398\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                     <g opacity=\"0.05\">
                        <rect x=\"0\" y=\"20\" width=\"200\" height=\"60\" rx=\"38.7857\" transform=\"rotate(0 61.9355 138.545)\" fill=\"#3B8AFF\"/>
                        <rect x=\"270\" y=\"-256\" width=\"180\" height=\"60\" rx=\"38.7857\" transform=\"rotate(90 62.3154 -190.173)\" fill=\"#3B8AFF\"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class=\"col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden\">
               <img src=\"{{base_url('Vendor/Template/assets/images/imagenescorrecaminos/logolineastec.svg')}}\" class=\"img-fluid gradient-main animated-scaleX p-5\" alt=\"images\">
         </div>
      </section>
      </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>
  {% endblock %}", "Auth\\login.twig.html", "/var/www/html/app/Views/Auth/login.twig.html");
    }
}
