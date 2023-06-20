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

/* Auth\register.twig.html */
class __TwigTemplate_344d1161ca9e93d20c9d42b74aa6b3c5 extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\" />
    <meta
      name=\"viewport\"
      content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"
    />
    <title>Register</title>

    <!-- Favicon -->
    <link
      rel=\"shortcut icon\"
      href=\"";
        // line 14
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/favicon.ico"), "html", null, true);
        echo "\"
    />

    <!-- Library / Plugin Css Build -->
    <link
      rel=\"stylesheet\"
      href=\"";
        // line 20
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/core/libs.min.css"), "html", null, true);
        echo "\"
    />

    <!-- Hope Ui Design System Css -->
    <link
      rel=\"stylesheet\"
      href=\"";
        // line 26
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/hope-ui.min.css?v=2.0.0"), "html", null, true);
        echo "\"
    />

    <!-- Custom Css -->
    <link
      rel=\"stylesheet\"
      href=\"";
        // line 32
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/custom.min.css?v=2.0.0"), "html", null, true);
        echo "\"
    />

    <!-- Dark Css -->
    <link
      rel=\"stylesheet\"
      href=\"";
        // line 38
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/dark.min.css"), "html", null, true);
        echo "\"
    />

    <!-- Customizer Css -->
    <link
      rel=\"stylesheet\"
      href=\"";
        // line 44
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/customizer.min.css"), "html", null, true);
        echo "\"
    />

    <!-- RTL Css -->
    <link
      rel=\"stylesheet\"
      href=\"";
        // line 50
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/rtl.min.css"), "html", null, true);
        echo "\"
    />
  </head>
  <body
    class=\" \"
    data-bs-spy=\"scroll\"
    data-bs-target=\"#elements-section\"
    data-bs-offset=\"0\"
    tabindex=\"0\"
  >
    <!-- loader Start -->
    <div id=\"loading\">
      <div class=\"loader simple-loader\">
        <div class=\"loader-body\"></div>
      </div>
    </div>
    <!-- loader END -->

    <div class=\"wrapper\">
      <section class=\"login-content\">
        <div class=\"row m-0 align-items-center bg-white vh-100\">
          <div
            class=\"col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden\"
          >
            <img
              src=\"";
        // line 75
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/auth/05.png"), "html", null, true);
        echo "\"
              class=\"img-fluid gradient-main animated-scaleX\"
              alt=\"images\"
            />
          </div>
          <div class=\"col-md-6\">
            <div class=\"row justify-content-center\">
              <div class=\"col-md-10\">
                <div
                  class=\"card card-transparent auth-card shadow-none d-flex justify-content-center mb-0\"
                >
                  <div class=\"card-body\">
                    <a
                      href=\"#\"
                      class=\"navbar-brand d-flex align-items-center mb-3\"
                    >
                      <!--Logo start-->
                      <!--logo End-->

                      <!--Logo start-->
                      <div class=\"logo-main\">
                        <div class=\"logo-normal\">
                          <svg
                            class=\"text-primary icon-30\"
                            viewBox=\"0 0 30 30\"
                            fill=\"none\"
                            xmlns=\"http://www.w3.org/2000/svg\"
                          >
                            <rect
                              x=\"-0.757324\"
                              y=\"19.2427\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 -0.757324 19.2427)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"7.72803\"
                              y=\"27.728\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 7.72803 27.728)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5366\"
                              y=\"16.3945\"
                              width=\"16\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5366 16.3945)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5562\"
                              y=\"-0.556152\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5562 -0.556152)\"
                              fill=\"currentColor\"
                            />
                          </svg>
                        </div>
                        <div class=\"logo-mini\">
                          <svg
                            class=\"text-primary icon-30\"
                            viewBox=\"0 0 30 30\"
                            fill=\"none\"
                            xmlns=\"http://www.w3.org/2000/svg\"
                          >
                            <rect
                              x=\"-0.757324\"
                              y=\"19.2427\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 -0.757324 19.2427)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"7.72803\"
                              y=\"27.728\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 7.72803 27.728)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5366\"
                              y=\"16.3945\"
                              width=\"16\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5366 16.3945)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5562\"
                              y=\"-0.556152\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5562 -0.556152)\"
                              fill=\"currentColor\"
                            />
                          </svg>
                        </div>
                      </div>
                      <!--logo End-->

                      <h4 class=\"logo-title ms-3\">Hope UI</h4>
                    </a>
                    <h2 class=\"mb-2 text-center\">Sign Up</h2>
                    <p class=\"text-center\">Create your Hope UI account.</p>
                    <form
                      action=\"";
        // line 194
        echo twig_escape_filter($this->env, base_url("auth/sing-up"), "html", null, true);
        echo "\"
                      method=\"post\"
                      enctype=\"multipart/form-data\"
                    >
                      <div class=\"row\">
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"full-name\" class=\"form-label\"
                              >Full Name</label
                            >
                            <input
                              type=\"text\"
                              class=\"form-control\"
                              name=\"username\"
                              id=\"full-name\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"last-name\" class=\"form-label\"
                              >Last Name</label
                            >
                            <input
                              type=\"text\"
                              class=\"form-control\"
                              id=\"last-name\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input
                              type=\"email\"
                              name=\"email\"
                              class=\"form-control\"
                              id=\"email\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"phone\" class=\"form-label\"
                              >Phone No.</label
                            >
                            <input
                              type=\"text\"
                              class=\"form-control\"
                              id=\"phone\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"password\" class=\"form-label\"
                              >Password</label
                            >
                            <input
                              type=\"password\"
                              name=\"password\"
                              class=\"form-control\"
                              id=\"password\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"confirm-password\" class=\"form-label\"
                              >Confirm Password</label
                            >
                            <input
                              type=\"text\"
                              name=\"password_confirm\"
                              class=\"form-control\"
                              id=\"confirm-password\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-12\">
                           <label for=\"role\" class=\"form-label\">
                              Selecciona un Rol
                           </label>
                           <select required name=\"role\" id=\"role\" class=\"form-select mb-3\" aria-label=\".form-select-lg example\">
                               <option selected disabled>Roles</option>
                               <option value=\"1\">Super Admin</option>
                               <option value=\"2\">Jefe de Departamento</option>
                               <option value=\"3\">Maestro</option>
                               <option value=\"4\">Alumno</option>
                           </select>
                       </div>

                        <div class=\"col-lg-12 d-flex justify-content-center\">
                          <div class=\"form-check mb-3\">
                            <input
                              type=\"checkbox\"
                              class=\"form-check-input\"
                              id=\"customCheck1\"
                            />
                            <label class=\"form-check-label\" for=\"customCheck1\"
                              >I agree with the terms of use</label
                            >
                          </div>
                        </div>
                      </div>
                      <div class=\"d-flex justify-content-center\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                          Sign Up
                        </button>
                      </div>
                      <p class=\"text-center my-3\">
                        or sign in with other accounts?
                      </p>
                      <div class=\"d-flex justify-content-center\">
                        <ul
                          class=\"list-group list-group-horizontal list-group-flush\"
                        >
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"";
        // line 320
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/fb.svg"), "html", null, true);
        echo "\"
                                alt=\"fb\"
                            /></a>
                          </li>
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"";
        // line 327
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/gm.svg"), "html", null, true);
        echo "\"
                                alt=\"gm\"
                            /></a>
                          </li>
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"";
        // line 334
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/im.svg"), "html", null, true);
        echo "\"
                                alt=\"im\"
                            /></a>
                          </li>
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"";
        // line 341
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/li.svg"), "html", null, true);
        echo "\"
                                alt=\"li\"
                            /></a>
                          </li>
                        </ul>
                      </div>
                      <p class=\"mt-3 text-center\">
                        Already have an Account
                        <a
                          href=\"";
        // line 350
        echo twig_escape_filter($this->env, base_url("auth/login"), "html", null, true);
        echo "\"
                          class=\"text-underline\"
                          >Sign In</a
                        >
                      </p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"sign-bg sign-bg-right\">
              <svg
                width=\"280\"
                height=\"230\"
                viewBox=\"0 0 421 359\"
                fill=\"none\"
                xmlns=\"http://www.w3.org/2000/svg\"
              >
                <g opacity=\"0.05\">
                  <rect
                    x=\"-15.0845\"
                    y=\"154.773\"
                    width=\"543\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(-45 -15.0845 154.773)\"
                    fill=\"#3A57E8\"
                  />
                  <rect
                    x=\"149.47\"
                    y=\"319.328\"
                    width=\"543\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(-45 149.47 319.328)\"
                    fill=\"#3A57E8\"
                  />
                  <rect
                    x=\"203.936\"
                    y=\"99.543\"
                    width=\"310.286\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(45 203.936 99.543)\"
                    fill=\"#3A57E8\"
                  />
                  <rect
                    x=\"204.316\"
                    y=\"-229.172\"
                    width=\"543\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(45 204.316 -229.172)\"
                    fill=\"#3A57E8\"
                  />
                </g>
              </svg>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Library Bundle Script -->
    <script src=\"";
        // line 414
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/core/libs.min.js"), "html", null, true);
        echo "\"></script>

    <!-- External Library Bundle Script -->
    <script src=\"";
        // line 417
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/core/external.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Widgetchart Script -->
    <script src=\"";
        // line 420
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/widgetcharts.js"), "html", null, true);
        echo "\"></script>

    <!-- mapchart Script -->
    <script src=\"";
        // line 423
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/vectore-chart.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 424
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/dashboard.js"), "html", null, true);
        echo "\"></script>

    <!-- fslightbox Script -->
    <script src=\"";
        // line 427
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/fslightbox.js"), "html", null, true);
        echo "\"></script>

    <!-- Settings Script -->
    <script src=\"";
        // line 430
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/setting.js"), "html", null, true);
        echo "\"></script>

    <!-- Slider-tab Script -->
    <script src=\"";
        // line 433
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/slider-tabs.js"), "html", null, true);
        echo "\"></script>

    <!-- Form Wizard Script -->
    <script src=\"";
        // line 436
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/form-wizard.js"), "html", null, true);
        echo "\"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script
      src=\"";
        // line 442
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/hope-ui.js"), "html", null, true);
        echo "\"
      defer
    ></script>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "Auth\\register.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  549 => 442,  540 => 436,  534 => 433,  528 => 430,  522 => 427,  516 => 424,  512 => 423,  506 => 420,  500 => 417,  494 => 414,  427 => 350,  415 => 341,  405 => 334,  395 => 327,  385 => 320,  256 => 194,  134 => 75,  106 => 50,  97 => 44,  88 => 38,  79 => 32,  70 => 26,  61 => 20,  52 => 14,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\" />
    <meta
      name=\"viewport\"
      content=\"width=device-width, initial-scale=1, shrink-to-fit=no\"
    />
    <title>Register</title>

    <!-- Favicon -->
    <link
      rel=\"shortcut icon\"
      href=\"{{base_url('Vendor/Template/assets/images/favicon.ico')}}\"
    />

    <!-- Library / Plugin Css Build -->
    <link
      rel=\"stylesheet\"
      href=\"{{base_url('Vendor/Template/assets/css/core/libs.min.css')}}\"
    />

    <!-- Hope Ui Design System Css -->
    <link
      rel=\"stylesheet\"
      href=\"{{base_url('Vendor/Template/assets/css/hope-ui.min.css?v=2.0.0')}}\"
    />

    <!-- Custom Css -->
    <link
      rel=\"stylesheet\"
      href=\"{{base_url('Vendor/Template/assets/css/custom.min.css?v=2.0.0')}}\"
    />

    <!-- Dark Css -->
    <link
      rel=\"stylesheet\"
      href=\"{{base_url('Vendor/Template/assets/css/dark.min.css')}}\"
    />

    <!-- Customizer Css -->
    <link
      rel=\"stylesheet\"
      href=\"{{base_url('Vendor/Template/assets/css/customizer.min.css')}}\"
    />

    <!-- RTL Css -->
    <link
      rel=\"stylesheet\"
      href=\"{{base_url('Vendor/Template/assets/css/rtl.min.css')}}\"
    />
  </head>
  <body
    class=\" \"
    data-bs-spy=\"scroll\"
    data-bs-target=\"#elements-section\"
    data-bs-offset=\"0\"
    tabindex=\"0\"
  >
    <!-- loader Start -->
    <div id=\"loading\">
      <div class=\"loader simple-loader\">
        <div class=\"loader-body\"></div>
      </div>
    </div>
    <!-- loader END -->

    <div class=\"wrapper\">
      <section class=\"login-content\">
        <div class=\"row m-0 align-items-center bg-white vh-100\">
          <div
            class=\"col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden\"
          >
            <img
              src=\"{{base_url('Vendor/Template/assets/images/auth/05.png')}}\"
              class=\"img-fluid gradient-main animated-scaleX\"
              alt=\"images\"
            />
          </div>
          <div class=\"col-md-6\">
            <div class=\"row justify-content-center\">
              <div class=\"col-md-10\">
                <div
                  class=\"card card-transparent auth-card shadow-none d-flex justify-content-center mb-0\"
                >
                  <div class=\"card-body\">
                    <a
                      href=\"#\"
                      class=\"navbar-brand d-flex align-items-center mb-3\"
                    >
                      <!--Logo start-->
                      <!--logo End-->

                      <!--Logo start-->
                      <div class=\"logo-main\">
                        <div class=\"logo-normal\">
                          <svg
                            class=\"text-primary icon-30\"
                            viewBox=\"0 0 30 30\"
                            fill=\"none\"
                            xmlns=\"http://www.w3.org/2000/svg\"
                          >
                            <rect
                              x=\"-0.757324\"
                              y=\"19.2427\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 -0.757324 19.2427)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"7.72803\"
                              y=\"27.728\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 7.72803 27.728)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5366\"
                              y=\"16.3945\"
                              width=\"16\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5366 16.3945)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5562\"
                              y=\"-0.556152\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5562 -0.556152)\"
                              fill=\"currentColor\"
                            />
                          </svg>
                        </div>
                        <div class=\"logo-mini\">
                          <svg
                            class=\"text-primary icon-30\"
                            viewBox=\"0 0 30 30\"
                            fill=\"none\"
                            xmlns=\"http://www.w3.org/2000/svg\"
                          >
                            <rect
                              x=\"-0.757324\"
                              y=\"19.2427\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 -0.757324 19.2427)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"7.72803\"
                              y=\"27.728\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(-45 7.72803 27.728)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5366\"
                              y=\"16.3945\"
                              width=\"16\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5366 16.3945)\"
                              fill=\"currentColor\"
                            />
                            <rect
                              x=\"10.5562\"
                              y=\"-0.556152\"
                              width=\"28\"
                              height=\"4\"
                              rx=\"2\"
                              transform=\"rotate(45 10.5562 -0.556152)\"
                              fill=\"currentColor\"
                            />
                          </svg>
                        </div>
                      </div>
                      <!--logo End-->

                      <h4 class=\"logo-title ms-3\">Hope UI</h4>
                    </a>
                    <h2 class=\"mb-2 text-center\">Sign Up</h2>
                    <p class=\"text-center\">Create your Hope UI account.</p>
                    <form
                      action=\"{{base_url('auth/sing-up')}}\"
                      method=\"post\"
                      enctype=\"multipart/form-data\"
                    >
                      <div class=\"row\">
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"full-name\" class=\"form-label\"
                              >Full Name</label
                            >
                            <input
                              type=\"text\"
                              class=\"form-control\"
                              name=\"username\"
                              id=\"full-name\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"last-name\" class=\"form-label\"
                              >Last Name</label
                            >
                            <input
                              type=\"text\"
                              class=\"form-control\"
                              id=\"last-name\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input
                              type=\"email\"
                              name=\"email\"
                              class=\"form-control\"
                              id=\"email\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"phone\" class=\"form-label\"
                              >Phone No.</label
                            >
                            <input
                              type=\"text\"
                              class=\"form-control\"
                              id=\"phone\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"password\" class=\"form-label\"
                              >Password</label
                            >
                            <input
                              type=\"password\"
                              name=\"password\"
                              class=\"form-control\"
                              id=\"password\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-6\">
                          <div class=\"form-group\">
                            <label for=\"confirm-password\" class=\"form-label\"
                              >Confirm Password</label
                            >
                            <input
                              type=\"text\"
                              name=\"password_confirm\"
                              class=\"form-control\"
                              id=\"confirm-password\"
                              placeholder=\" \"
                            />
                          </div>
                        </div>
                        <div class=\"col-lg-12\">
                           <label for=\"role\" class=\"form-label\">
                              Selecciona un Rol
                           </label>
                           <select required name=\"role\" id=\"role\" class=\"form-select mb-3\" aria-label=\".form-select-lg example\">
                               <option selected disabled>Roles</option>
                               <option value=\"1\">Super Admin</option>
                               <option value=\"2\">Jefe de Departamento</option>
                               <option value=\"3\">Maestro</option>
                               <option value=\"4\">Alumno</option>
                           </select>
                       </div>

                        <div class=\"col-lg-12 d-flex justify-content-center\">
                          <div class=\"form-check mb-3\">
                            <input
                              type=\"checkbox\"
                              class=\"form-check-input\"
                              id=\"customCheck1\"
                            />
                            <label class=\"form-check-label\" for=\"customCheck1\"
                              >I agree with the terms of use</label
                            >
                          </div>
                        </div>
                      </div>
                      <div class=\"d-flex justify-content-center\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                          Sign Up
                        </button>
                      </div>
                      <p class=\"text-center my-3\">
                        or sign in with other accounts?
                      </p>
                      <div class=\"d-flex justify-content-center\">
                        <ul
                          class=\"list-group list-group-horizontal list-group-flush\"
                        >
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"{{base_url('Vendor/Template/assets/images/brands/fb.svg')}}\"
                                alt=\"fb\"
                            /></a>
                          </li>
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"{{base_url('Vendor/Template/assets/images/brands/gm.svg')}}\"
                                alt=\"gm\"
                            /></a>
                          </li>
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"{{base_url('Vendor/Template/assets/images/brands/im.svg')}}\"
                                alt=\"im\"
                            /></a>
                          </li>
                          <li class=\"list-group-item border-0 pb-0\">
                            <a href=\"#\"
                              ><img
                                src=\"{{base_url('Vendor/Template/assets/images/brands/li.svg')}}\"
                                alt=\"li\"
                            /></a>
                          </li>
                        </ul>
                      </div>
                      <p class=\"mt-3 text-center\">
                        Already have an Account
                        <a
                          href=\"{{base_url('auth/login')}}\"
                          class=\"text-underline\"
                          >Sign In</a
                        >
                      </p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"sign-bg sign-bg-right\">
              <svg
                width=\"280\"
                height=\"230\"
                viewBox=\"0 0 421 359\"
                fill=\"none\"
                xmlns=\"http://www.w3.org/2000/svg\"
              >
                <g opacity=\"0.05\">
                  <rect
                    x=\"-15.0845\"
                    y=\"154.773\"
                    width=\"543\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(-45 -15.0845 154.773)\"
                    fill=\"#3A57E8\"
                  />
                  <rect
                    x=\"149.47\"
                    y=\"319.328\"
                    width=\"543\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(-45 149.47 319.328)\"
                    fill=\"#3A57E8\"
                  />
                  <rect
                    x=\"203.936\"
                    y=\"99.543\"
                    width=\"310.286\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(45 203.936 99.543)\"
                    fill=\"#3A57E8\"
                  />
                  <rect
                    x=\"204.316\"
                    y=\"-229.172\"
                    width=\"543\"
                    height=\"77.5714\"
                    rx=\"38.7857\"
                    transform=\"rotate(45 204.316 -229.172)\"
                    fill=\"#3A57E8\"
                  />
                </g>
              </svg>
            </div>
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
    <script src=\"{{base_url('Vendor/Template/assets/js/charts/dashboard.js')}}\"></script>

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
    <script
      src=\"{{base_url('Vendor/Template/assets/js/hope-ui.js')}}\"
      defer
    ></script>
  </body>
</html>
", "Auth\\register.twig.html", "/var/www/html/app/Views/Auth/register.twig.html");
    }
}
