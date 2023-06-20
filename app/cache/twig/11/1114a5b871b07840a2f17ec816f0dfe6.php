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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "


<!doctype html>
<html lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
      <title>Login</title>
      
      <!-- Favicon -->
      <link rel=\"shortcut icon\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/favicon.ico"), "html", null, true);
        echo "\" />
      
      <!-- Library / Plugin Css Build -->
      <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/core/libs.min.css"), "html", null, true);
        echo "\" />
      
      
      <!-- Hope Ui Design System Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/hope-ui.min.css?v=2.0.0"), "html", null, true);
        echo "\" />
      
      <!-- Custom Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/custom.min.css?v=2.0.0"), "html", null, true);
        echo "\" />
      
      <!-- Dark Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/dark.min.css"), "html", null, true);
        echo "\"/>
      
      <!-- Customizer Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/customizer.min.css"), "html", null, true);
        echo "\" />
      
      <!-- RTL Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/rtl.min.css"), "html", null, true);
        echo "\"/>
      
      
  </head>
  <body class=\" \" data-bs-spy=\"scroll\" data-bs-target=\"#elements-section\" data-bs-offset=\"0\" tabindex=\"0\">
    <!-- loader Start -->
    <div id=\"loading\">
      <div class=\"loader simple-loader\">
          <div class=\"loader-body\"></div>
      </div>    </div>
    <!-- loader END -->
    
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
                                      <svg class=\"text-primary icon-30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                                          <rect x=\"-0.757324\" y=\"19.2427\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 -0.757324 19.2427)\" fill=\"currentColor\"/>
                                          <rect x=\"7.72803\" y=\"27.728\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 7.72803 27.728)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5366\" y=\"16.3945\" width=\"16\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5366 16.3945)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5562\" y=\"-0.556152\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5562 -0.556152)\" fill=\"currentColor\"/>
                                      </svg>
                                  </div>
                                  <div class=\"logo-mini\">
                                      <svg class=\"text-primary icon-30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                                          <rect x=\"-0.757324\" y=\"19.2427\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 -0.757324 19.2427)\" fill=\"currentColor\"/>
                                          <rect x=\"7.72803\" y=\"27.728\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 7.72803 27.728)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5366\" y=\"16.3945\" width=\"16\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5366 16.3945)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5562\" y=\"-0.556152\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5562 -0.556152)\" fill=\"currentColor\"/>
                                      </svg>
                                  </div>
                              </div>
                              <!--logo End-->
                              
                              
                              
                              
                              <h4 class=\"logo-title ms-3\">Hope UI</h4>
                           </a>
                           <h2 class=\"mb-2 text-center\">Sign In</h2>
                           <p class=\"text-center\">Login to stay connected.</p>
                           <form action=\"";
        // line 83
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
                              <p class=\"text-center my-3\">or sign in with other accounts?</p>
                              <div class=\"d-flex justify-content-center\">
                                 <ul class=\"list-group list-group-horizontal list-group-flush\">
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"";
        // line 112
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/fb.svg"), "html", null, true);
        echo "\" alt=\"fb\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"";
        // line 115
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/gm.svg"), "html", null, true);
        echo "\" alt=\"gm\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"";
        // line 118
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/im.svg"), "html", null, true);
        echo "\" alt=\"im\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"";
        // line 121
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/li.svg"), "html", null, true);
        echo "\" alt=\"li\"></a>
                                    </li>
                                 </ul>
                              </div>
                              <p class=\"mt-3 text-center\">
                                 Don’t have an account? <a href=\"";
        // line 126
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
                     <rect x=\"-157.085\" y=\"193.773\" width=\"543\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(-45 -157.085 193.773)\" fill=\"#3B8AFF\"/>
                     <rect x=\"7.46875\" y=\"358.327\" width=\"543\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(-45 7.46875 358.327)\" fill=\"#3B8AFF\"/>
                     <rect x=\"61.9355\" y=\"138.545\" width=\"310.286\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(45 61.9355 138.545)\" fill=\"#3B8AFF\"/>
                     <rect x=\"62.3154\" y=\"-190.173\" width=\"543\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(45 62.3154 -190.173)\" fill=\"#3B8AFF\"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class=\"col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden\">
               <img src=\"";
        // line 145
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/auth/01.png"), "html", null, true);
        echo "\" class=\"img-fluid gradient-main animated-scaleX\" alt=\"images\">
            </div>
         </div>
      </section>
      </div>
    
    <!-- Library Bundle Script -->
    <script src=\"";
        // line 152
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/core/libs.min.js"), "html", null, true);
        echo "\"></script>
    
    <!-- External Library Bundle Script -->
    <script src=\"";
        // line 155
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/core/external.min.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Widgetchart Script -->
    <script src=\"";
        // line 158
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/widgetcharts.js"), "html", null, true);
        echo "\"></script>
    
    <!-- mapchart Script -->
    <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/vectore-chart.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 162
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/dashboard.js"), "html", null, true);
        echo "\" ></script>
    
    <!-- fslightbox Script -->
    <script src=\"";
        // line 165
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/fslightbox.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Settings Script -->
    <script src=\"";
        // line 168
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/setting.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Slider-tab Script -->
    <script src=\"";
        // line 171
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/slider-tabs.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Form Wizard Script -->
    <script src=\"";
        // line 174
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/form-wizard.js"), "html", null, true);
        echo "\"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src=\"";
        // line 179
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/hope-ui.js"), "html", null, true);
        echo "\" defer></script>
    
  </body>
</html>";
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
        return array (  286 => 179,  278 => 174,  272 => 171,  266 => 168,  260 => 165,  254 => 162,  250 => 161,  244 => 158,  238 => 155,  232 => 152,  222 => 145,  200 => 126,  192 => 121,  186 => 118,  180 => 115,  174 => 112,  142 => 83,  87 => 31,  81 => 28,  75 => 25,  69 => 22,  63 => 19,  56 => 15,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("


<!doctype html>
<html lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
      <title>Login</title>
      
      <!-- Favicon -->
      <link rel=\"shortcut icon\" href=\"{{base_url('Vendor/Template/assets/images/favicon.ico')}}\" />
      
      <!-- Library / Plugin Css Build -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/core/libs.min.css')}}\" />
      
      
      <!-- Hope Ui Design System Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/hope-ui.min.css?v=2.0.0')}}\" />
      
      <!-- Custom Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/custom.min.css?v=2.0.0')}}\" />
      
      <!-- Dark Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/dark.min.css')}}\"/>
      
      <!-- Customizer Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/customizer.min.css')}}\" />
      
      <!-- RTL Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/rtl.min.css')}}\"/>
      
      
  </head>
  <body class=\" \" data-bs-spy=\"scroll\" data-bs-target=\"#elements-section\" data-bs-offset=\"0\" tabindex=\"0\">
    <!-- loader Start -->
    <div id=\"loading\">
      <div class=\"loader simple-loader\">
          <div class=\"loader-body\"></div>
      </div>    </div>
    <!-- loader END -->
    
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
                                      <svg class=\"text-primary icon-30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                                          <rect x=\"-0.757324\" y=\"19.2427\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 -0.757324 19.2427)\" fill=\"currentColor\"/>
                                          <rect x=\"7.72803\" y=\"27.728\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 7.72803 27.728)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5366\" y=\"16.3945\" width=\"16\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5366 16.3945)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5562\" y=\"-0.556152\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5562 -0.556152)\" fill=\"currentColor\"/>
                                      </svg>
                                  </div>
                                  <div class=\"logo-mini\">
                                      <svg class=\"text-primary icon-30\" viewBox=\"0 0 30 30\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                                          <rect x=\"-0.757324\" y=\"19.2427\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 -0.757324 19.2427)\" fill=\"currentColor\"/>
                                          <rect x=\"7.72803\" y=\"27.728\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(-45 7.72803 27.728)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5366\" y=\"16.3945\" width=\"16\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5366 16.3945)\" fill=\"currentColor\"/>
                                          <rect x=\"10.5562\" y=\"-0.556152\" width=\"28\" height=\"4\" rx=\"2\" transform=\"rotate(45 10.5562 -0.556152)\" fill=\"currentColor\"/>
                                      </svg>
                                  </div>
                              </div>
                              <!--logo End-->
                              
                              
                              
                              
                              <h4 class=\"logo-title ms-3\">Hope UI</h4>
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
                              <p class=\"text-center my-3\">or sign in with other accounts?</p>
                              <div class=\"d-flex justify-content-center\">
                                 <ul class=\"list-group list-group-horizontal list-group-flush\">
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"{{base_url('Vendor/Template/assets/images/brands/fb.svg')}}\" alt=\"fb\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"{{base_url('Vendor/Template/assets/images/brands/gm.svg')}}\" alt=\"gm\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"{{base_url('Vendor/Template/assets/images/brands/im.svg')}}\" alt=\"im\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"#\"><img src=\"{{base_url('Vendor/Template/assets/images/brands/li.svg')}}\" alt=\"li\"></a>
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
                     <rect x=\"-157.085\" y=\"193.773\" width=\"543\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(-45 -157.085 193.773)\" fill=\"#3B8AFF\"/>
                     <rect x=\"7.46875\" y=\"358.327\" width=\"543\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(-45 7.46875 358.327)\" fill=\"#3B8AFF\"/>
                     <rect x=\"61.9355\" y=\"138.545\" width=\"310.286\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(45 61.9355 138.545)\" fill=\"#3B8AFF\"/>
                     <rect x=\"62.3154\" y=\"-190.173\" width=\"543\" height=\"77.5714\" rx=\"38.7857\" transform=\"rotate(45 62.3154 -190.173)\" fill=\"#3B8AFF\"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class=\"col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden\">
               <img src=\"{{base_url('Vendor/Template/assets/images/auth/01.png')}}\" class=\"img-fluid gradient-main animated-scaleX\" alt=\"images\">
            </div>
         </div>
      </section>
      </div>
    
    <!-- Library Bundle Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/core/libs.min.js')}}\"></script>
    
    <!-- External Library Bundle Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/core/external.min.js')}}\"></script>
    
    <!-- Widgetchart Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/charts/widgetcharts.js')}}\"></script>
    
    <!-- mapchart Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/charts/vectore-chart.js')}}\"></script>
    <script src=\"{{base_url('Vendor/Template/assets/js/charts/dashboard.js')}}\" ></script>
    
    <!-- fslightbox Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/plugins/fslightbox.js')}}\"></script>
    
    <!-- Settings Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/plugins/setting.js')}}\"></script>
    
    <!-- Slider-tab Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/plugins/slider-tabs.js')}}\"></script>
    
    <!-- Form Wizard Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/plugins/form-wizard.js')}}\"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src=\"{{base_url('Vendor/Template/assets/js/hope-ui.js')}}\" defer></script>
    
  </body>
</html>", "Auth\\login.twig.html", "/var/www/html/app/Views/Auth/login.twig.html");
    }
}
