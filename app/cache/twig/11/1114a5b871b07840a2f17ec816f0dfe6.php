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
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg"), "html", null, true);
        echo "\"/>
      
      <!-- Library / Plugin Css Build -->
      <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/core/libs.min.css"), "html", null, true);
        echo "\" />
      
      <!-- Hope Ui Design System Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/hope-ui.css"), "html", null, true);
        echo "\"/>
      
      <!-- Custom Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/custom.css"), "html", null, true);
        echo "\" />
      
      <!-- Dark Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/dark.min.css"), "html", null, true);
        echo "\"/>
      
      <!-- Customizer Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/css/customizer.css"), "html", null, true);
        echo "\" />
      
      <!-- RTL Css -->
      <link rel=\"stylesheet\" href=\"";
        // line 30
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
                                   <img class=\"icon-40\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg"), "html", null, true);
        echo "\" alt=\"\" style=\"width: 70px; height: 60px;\">
                                 </div>
                                 <div class=\"logo-mini\">
                                   <img class=\"icon-40\" src=\"";
        // line 60
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
        // line 69
        echo twig_escape_filter($this->env, base_url("auth/sing-in"), "html", null, true);
        echo "\" enctype=\"multipart/form-data\" method=\"post\">
                              <div class=\"row\">
                                 <div class=\"col-lg-12\">
                                    <div class=\"form-group\">
                                       <label for=\"email\" class=\"form-label\">Control Number</label>
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
        // line 98
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/fb.svg"), "html", null, true);
        echo "\" alt=\"fb\"></a>
                                    </li>
                                    <li class=\"list-group-item border-0 pb-0\">
                                       <a href=\"https://www.instagram.com/tecnmcampusocotlan/#\"><img src=\"";
        // line 101
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/brands/im.svg"), "html", null, true);
        echo "\" alt=\"im\"></a>
                                    </li>
                                 </ul>
                              </div>
                              <p class=\"mt-3 text-center\">
                                 Don’t have an account? <a href=\"";
        // line 106
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
        // line 123
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/imagenescorrecaminos/logolineastec.svg"), "html", null, true);
        echo "\" class=\"img-fluid gradient-main animated-scaleX p-5\" alt=\"images\">
         </div>
      </section>
      </div>


      <!-- Bottom od settings -->
      <a class=\"btn btn-fixed-end btn-warning btn-icon btn-setting\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasExample\" role=\"button\" aria-controls=\"offcanvasExample\">
         <svg width=\"24\" viewBox=\"0 0 24 24\" class=\"animated-rotate icon-24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
             <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>
             <circle cx=\"12.1747\" cy=\"11.8891\" r=\"2.63616\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></circle>
         </svg>
       </a>



      <!-- offcanvas start -->
    <div class=\"offcanvas offcanvas-end\" tabindex=\"-1\" id=\"offcanvasExample\" data-bs-scroll=\"true\" data-bs-backdrop=\"true\" aria-labelledby=\"offcanvasExampleLabel\">
      <div class=\"offcanvas-header\">
        <div class=\"d-flex align-items-center\">
          <h3 class=\"offcanvas-title me-3\" id=\"offcanvasExampleLabel\">Settings</h3>
        </div>
        <button type=\"button\" class=\"btn-close text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
      </div>
      <div class=\"offcanvas-body data-scrollbar\">
        <div class=\"row\">
          <div class=\"col-lg-12\">
             <h5 class=\"mb-3\">Scheme</h5>
            <div class=\"d-grid gap-3 grid-cols-3 mb-4\">
              <div class=\"btn btn-border\" data-setting=\"color-mode\" data-name=\"color\" data-value=\"auto\">
                  <svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path fill=\"currentColor\" d=\"M7,2V13H10V22L17,10H13L17,2H7Z\" />
                  </svg>
                <span class=\"ms-2 \"> Auto </span>
              </div>
    
               <div class=\"btn btn-border\" data-setting=\"color-mode\" data-name=\"color\" data-value=\"dark\">
                 <svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path fill=\"currentColor\" d=\"M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z\" />
                  </svg>
                <span class=\"ms-2 \"> Dark  </span>
              </div>
               <div class=\"btn btn-border active\" data-setting=\"color-mode\" data-name=\"color\" data-value=\"light\">
                  <svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                    <path fill=\"currentColor\" d=\"M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z\" />
                </svg>
                <span class=\"ms-2 \"> Light</span>
              </div>
            </div>
            <hr class=\"hr-horizontal\"> 
            <div class=\"d-flex align-items-center justify-content-between\">
            <h5 class=\"mt-4 mb-3\">Color Customizer</h5>
            <button class=\"btn btn-transparent p-0 border-0\" data-value=\"theme-color-default\" data-info=\"#079aa2\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Default\">
              <svg class=\"icon-18\" width=\"18\"  viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z\" fill=\"#31BAF1\"/>
                <path d=\"M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z\" fill=\"#0169CA\"/>
              </svg>
            </button>
            </div>
            <div class=\"grid-cols-5 mb-4 d-grid gap-x-2\">
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-blue\"   data-info=\"#573BFF\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-1\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#00C3F9\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#573BFF\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\" data-value=\"theme-color-gray\" data-info=\"#FD8D00\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-2\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#91969E\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#FD8D00\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-red\" data-info=\"#366AF0\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-3\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#DB5363\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#366AF0\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-yellow\" data-info=\"#6410F1\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-4\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#EA6A12\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#6410F1\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-pink\" data-info=\"#25C799\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-5\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#E586B3\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#25C799\" /></svg>
              </div>
              
            </div>
            <hr class=\"hr-horizontal\">
            <h5 class=\"mb-3 mt-4\">Scheme Direction</h5>
            <div class=\"d-grid gap-3 grid-cols-2 mb-4\">
              <div class=\"text-center\">
                <img src=\"";
        // line 204
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/01.png"), "html", null, true);
        echo "\" alt=\"ltr\" class=\"mode dark-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"ltr\">
                <img src=\"";
        // line 205
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/01.png"), "html", null, true);
        echo "\" alt=\"ltr\" class=\"mode light-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"ltr\">
                <span class=\" mt-2\"> LTR </span>
              </div>
               <div class=\"text-center\">
                 <img src=\"";
        // line 209
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/02.png"), "html", null, true);
        echo "\" alt=\"\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"rtl\">
                  <img src=\"";
        // line 210
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/02.png"), "html", null, true);
        echo "\" alt=\"\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"rtl\">
                  <span class=\"mt-2 \"> RTL  </span>
              </div>
            </div>
            <!--<hr class=\"hr-horizontal\">
            <h5 class=\"mt-4 mb-3\">Sidebar Color</h5>
            <div class=\"d-grid gap-3 grid-cols-2 mb-4\">
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-white\">
                <span class=\"\"> Default </span>
              </div>
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-dark\">
                <span class=\"\"> Dark </span>
              </div>
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-color\">
                <span class=\"\"> Color </span>
              </div>
              
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-transparent\">
                <span class=\"\"> Transparent </span>
              </div>
            </div>
            <hr class=\"hr-horizontal\">
            <h5 class=\"mt-4 mb-3\">Sidebar Types</h5>
            <div class=\"d-grid gap-3 grid-cols-3 mb-4\">
              <div class=\"text-center\">
                <img src=\"";
        // line 235
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/03.png"), "html", null, true);
        echo "\" alt=\"mini\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-mini\">
                <img src=\"";
        // line 236
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/03.png"), "html", null, true);
        echo "\" alt=\"mini\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-mini\">
                <span class=\"mt-2\">Mini</span>
              </div>
              <div class=\"text-center\">
               <img src=\"";
        // line 240
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/04.png"), "html", null, true);
        echo "\" alt=\"hover\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-hover\" data-extra-value=\"sidebar-mini\">
               <img src=\"";
        // line 241
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/04.png"), "html", null, true);
        echo "\" alt=\"hover\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-hover\" data-extra-value=\"sidebar-mini\">
                <span class=\"mt-2\">Hover</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"";
        // line 245
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/05.png"), "html", null, true);
        echo "\" alt=\"boxed\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-boxed\">
                 <img src=\"";
        // line 246
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/05.png"), "html", null, true);
        echo "\" alt=\"boxed\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-boxed\">
                <span class=\"mt-2\">Boxed</span>
              </div>
            </div>
            <hr class=\"hr-horizontal\">
            <h5 class=\"mt-4 mb-3\">Sidebar Active Style</h5>
            <div class=\"d-grid gap-3 grid-cols-2 mb-4\">
              <div class=\"text-center\">
                <img src=\"";
        // line 254
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/06.png"), "html", null, true);
        echo "\" alt=\"rounded-one-side\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded\">
                <img src=\"";
        // line 255
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/06.png"), "html", null, true);
        echo "\" alt=\"rounded-one-side\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded\">
                <span class=\"mt-2\">Rounded One Side</span>
              </div>
              <div class=\"text-center\">
                <img src=\"";
        // line 259
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/07.png"), "html", null, true);
        echo "\" alt=\"rounded-all\" class=\"mode dark-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded-all\">
                <img src=\"";
        // line 260
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/07.png"), "html", null, true);
        echo "\" alt=\"rounded-all\" class=\"mode light-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded-all\">
                <span class=\"mt-2\">Rounded All</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"";
        // line 264
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/08.png"), "html", null, true);
        echo "\" alt=\"pill-one-side\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill\">
                 <img src=\"";
        // line 265
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/09.png"), "html", null, true);
        echo "\" alt=\"pill-one-side\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill\">
                <span class=\"mt-2\">Pill One Side</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"";
        // line 269
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/09.png"), "html", null, true);
        echo "\" alt=\"pill-all\" class=\"mode dark-img img-fluid btn-border p-0 flex-column\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill-all\">
                 <img src=\"";
        // line 270
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/08.png"), "html", null, true);
        echo "\" alt=\"pill-all\" class=\"mode light-img img-fluid btn-border p-0 flex-column\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill-all\">
                <span class=\"mt-2\">Pill All</span>
              </div>
            </div>
            <hr class=\"hr-horizontal\">
             <h5 class=\"mt-4 mb-3\">Navbar Style</h5>
            <div class=\"d-grid gap-3 grid-cols-2 \">
              <div class=\" text-center\">
                <img src=\"";
        // line 278
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/11.png"), "html", null, true);
        echo "\" alt=\"image\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"nav-glass\">
                <img src=\"";
        // line 279
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/10.png"), "html", null, true);
        echo "\" alt=\"image\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"nav-glass\">
                <span class=\"mt-2\">Glass</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"";
        // line 283
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/10.png"), "html", null, true);
        echo "\" alt=\"color\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar-header\" data-name=\"navbar-type\" data-value=\"navs-bg-color\">
                 <img src=\"";
        // line 284
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/11.png"), "html", null, true);
        echo "\" alt=\"color\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar-header\" data-name=\"navbar-type\" data-value=\"navs-bg-color\">
                <span class=\"mt-2\">Color</span>
              </div>
              <div class=\" text-center\">
                 <img src=\"";
        // line 288
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/12.png"), "html", null, true);
        echo "\" alt=\"sticky\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-sticky\">
                 <img src=\"";
        // line 289
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/12.png"), "html", null, true);
        echo "\" alt=\"sticky\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-sticky\">
                <span class=\"mt-2\">Sticky</span>
              </div>
              <div class=\"text-center\">
                  <img src=\"";
        // line 293
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/dark/13.png"), "html", null, true);
        echo "\" alt=\"transparent\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-transparent\">
                  <img src=\"";
        // line 294
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/images/settings/light/13.png"), "html", null, true);
        echo "\" alt=\"transparent\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-transparent\">
                <span class=\"mt-2\">Transparent</span>
              </div>
              <div class=\"btn btn-border active col-span-full mt-4 d-block\" data-setting=\"navbar\" data-name=\"navbar-default\" data-value=\"default\">
                <span class=\"\"> Default Navbar</span>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </div>
    
    <!-- Library Bundle Script -->
    <script src=\"";
        // line 307
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/core/libs.min.js"), "html", null, true);
        echo "\"></script>
    
    <!-- External Library Bundle Script -->
    <script src=\"";
        // line 310
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/core/external.min.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Widgetchart Script -->
    <script src=\"";
        // line 313
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/widgetcharts.js"), "html", null, true);
        echo "\"></script>
    
    <!-- mapchart Script -->
    <script src=\"";
        // line 316
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/vectore-chart.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 317
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/charts/dashboard.js"), "html", null, true);
        echo "\" ></script>
    
    <!-- fslightbox Script -->
    <script src=\"";
        // line 320
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/fslightbox.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Settings Script -->
    <script src=\"";
        // line 323
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/setting.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Slider-tab Script -->
    <script src=\"";
        // line 326
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/slider-tabs.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Form Wizard Script -->
    <script src=\"";
        // line 329
        echo twig_escape_filter($this->env, base_url("Vendor/Template/assets/js/plugins/form-wizard.js"), "html", null, true);
        echo "\"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src=\"";
        // line 334
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
        return array (  519 => 334,  511 => 329,  505 => 326,  499 => 323,  493 => 320,  487 => 317,  483 => 316,  477 => 313,  471 => 310,  465 => 307,  449 => 294,  445 => 293,  438 => 289,  434 => 288,  427 => 284,  423 => 283,  416 => 279,  412 => 278,  401 => 270,  397 => 269,  390 => 265,  386 => 264,  379 => 260,  375 => 259,  368 => 255,  364 => 254,  353 => 246,  349 => 245,  342 => 241,  338 => 240,  331 => 236,  327 => 235,  299 => 210,  295 => 209,  288 => 205,  284 => 204,  200 => 123,  180 => 106,  172 => 101,  166 => 98,  134 => 69,  122 => 60,  116 => 57,  86 => 30,  80 => 27,  74 => 24,  68 => 21,  62 => 18,  56 => 15,  50 => 12,  37 => 1,);
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
      <link rel=\"shortcut icon\" href=\"{{base_url('Vendor/Template/assets/images/imagenescorrecaminos/correcaminosicono.svg')}}\"/>
      
      <!-- Library / Plugin Css Build -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/core/libs.min.css')}}\" />
      
      <!-- Hope Ui Design System Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/hope-ui.css')}}\"/>
      
      <!-- Custom Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/custom.css')}}\" />
      
      <!-- Dark Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/dark.min.css')}}\"/>
      
      <!-- Customizer Css -->
      <link rel=\"stylesheet\" href=\"{{base_url('Vendor/Template/assets/css/customizer.css')}}\" />
      
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
                                       <label for=\"email\" class=\"form-label\">Control Number</label>
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


      <!-- Bottom od settings -->
      <a class=\"btn btn-fixed-end btn-warning btn-icon btn-setting\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasExample\" role=\"button\" aria-controls=\"offcanvasExample\">
         <svg width=\"24\" viewBox=\"0 0 24 24\" class=\"animated-rotate icon-24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
             <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path>
             <circle cx=\"12.1747\" cy=\"11.8891\" r=\"2.63616\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></circle>
         </svg>
       </a>



      <!-- offcanvas start -->
    <div class=\"offcanvas offcanvas-end\" tabindex=\"-1\" id=\"offcanvasExample\" data-bs-scroll=\"true\" data-bs-backdrop=\"true\" aria-labelledby=\"offcanvasExampleLabel\">
      <div class=\"offcanvas-header\">
        <div class=\"d-flex align-items-center\">
          <h3 class=\"offcanvas-title me-3\" id=\"offcanvasExampleLabel\">Settings</h3>
        </div>
        <button type=\"button\" class=\"btn-close text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
      </div>
      <div class=\"offcanvas-body data-scrollbar\">
        <div class=\"row\">
          <div class=\"col-lg-12\">
             <h5 class=\"mb-3\">Scheme</h5>
            <div class=\"d-grid gap-3 grid-cols-3 mb-4\">
              <div class=\"btn btn-border\" data-setting=\"color-mode\" data-name=\"color\" data-value=\"auto\">
                  <svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path fill=\"currentColor\" d=\"M7,2V13H10V22L17,10H13L17,2H7Z\" />
                  </svg>
                <span class=\"ms-2 \"> Auto </span>
              </div>
    
               <div class=\"btn btn-border\" data-setting=\"color-mode\" data-name=\"color\" data-value=\"dark\">
                 <svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path fill=\"currentColor\" d=\"M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z\" />
                  </svg>
                <span class=\"ms-2 \"> Dark  </span>
              </div>
               <div class=\"btn btn-border active\" data-setting=\"color-mode\" data-name=\"color\" data-value=\"light\">
                  <svg class=\"icon-20\" width=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                    <path fill=\"currentColor\" d=\"M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z\" />
                </svg>
                <span class=\"ms-2 \"> Light</span>
              </div>
            </div>
            <hr class=\"hr-horizontal\"> 
            <div class=\"d-flex align-items-center justify-content-between\">
            <h5 class=\"mt-4 mb-3\">Color Customizer</h5>
            <button class=\"btn btn-transparent p-0 border-0\" data-value=\"theme-color-default\" data-info=\"#079aa2\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Default\">
              <svg class=\"icon-18\" width=\"18\"  viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z\" fill=\"#31BAF1\"/>
                <path d=\"M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z\" fill=\"#0169CA\"/>
              </svg>
            </button>
            </div>
            <div class=\"grid-cols-5 mb-4 d-grid gap-x-2\">
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-blue\"   data-info=\"#573BFF\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-1\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#00C3F9\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#573BFF\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\" data-value=\"theme-color-gray\" data-info=\"#FD8D00\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-2\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#91969E\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#FD8D00\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-red\" data-info=\"#366AF0\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-3\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#DB5363\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#366AF0\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-yellow\" data-info=\"#6410F1\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-4\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#EA6A12\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#6410F1\" /></svg>
              </div>
              <div class=\"btn btn-border bg-transparent\"  data-value=\"theme-color-pink\" data-info=\"#25C799\" data-setting=\"color-mode1\" data-name=\"color\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"\" data-bs-original-title=\"Theme-5\">
              <svg  class=\"customizer-btn icon-32\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"32\" > <circle cx=\"12\" cy=\"12\" r=\"10\" fill=\"#E586B3\" /> <path d=\"M2,12 a1,1 1 1,0 20,0\" fill=\"#25C799\" /></svg>
              </div>
              
            </div>
            <hr class=\"hr-horizontal\">
            <h5 class=\"mb-3 mt-4\">Scheme Direction</h5>
            <div class=\"d-grid gap-3 grid-cols-2 mb-4\">
              <div class=\"text-center\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/01.png')}}\" alt=\"ltr\" class=\"mode dark-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"ltr\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/01.png')}}\" alt=\"ltr\" class=\"mode light-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"ltr\">
                <span class=\" mt-2\"> LTR </span>
              </div>
               <div class=\"text-center\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/02.png')}}\" alt=\"\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"rtl\">
                  <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/02.png')}}\" alt=\"\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"dir-mode\" data-name=\"dir\" data-value=\"rtl\">
                  <span class=\"mt-2 \"> RTL  </span>
              </div>
            </div>
            <!--<hr class=\"hr-horizontal\">
            <h5 class=\"mt-4 mb-3\">Sidebar Color</h5>
            <div class=\"d-grid gap-3 grid-cols-2 mb-4\">
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-white\">
                <span class=\"\"> Default </span>
              </div>
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-dark\">
                <span class=\"\"> Dark </span>
              </div>
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-color\">
                <span class=\"\"> Color </span>
              </div>
              
              <div class=\"btn btn-border d-block\" data-setting=\"sidebar\" data-name=\"sidebar-color\" data-value=\"sidebar-transparent\">
                <span class=\"\"> Transparent </span>
              </div>
            </div>
            <hr class=\"hr-horizontal\">
            <h5 class=\"mt-4 mb-3\">Sidebar Types</h5>
            <div class=\"d-grid gap-3 grid-cols-3 mb-4\">
              <div class=\"text-center\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/03.png')}}\" alt=\"mini\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-mini\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/03.png')}}\" alt=\"mini\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-mini\">
                <span class=\"mt-2\">Mini</span>
              </div>
              <div class=\"text-center\">
               <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/04.png')}}\" alt=\"hover\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-hover\" data-extra-value=\"sidebar-mini\">
               <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/04.png')}}\" alt=\"hover\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-hover\" data-extra-value=\"sidebar-mini\">
                <span class=\"mt-2\">Hover</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/05.png')}}\" alt=\"boxed\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-boxed\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/05.png')}}\" alt=\"boxed\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-type\" data-value=\"sidebar-boxed\">
                <span class=\"mt-2\">Boxed</span>
              </div>
            </div>
            <hr class=\"hr-horizontal\">
            <h5 class=\"mt-4 mb-3\">Sidebar Active Style</h5>
            <div class=\"d-grid gap-3 grid-cols-2 mb-4\">
              <div class=\"text-center\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/06.png')}}\" alt=\"rounded-one-side\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/06.png')}}\" alt=\"rounded-one-side\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded\">
                <span class=\"mt-2\">Rounded One Side</span>
              </div>
              <div class=\"text-center\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/07.png')}}\" alt=\"rounded-all\" class=\"mode dark-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded-all\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/07.png')}}\" alt=\"rounded-all\" class=\"mode light-img img-fluid btn-border p-0 flex-column active mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-rounded-all\">
                <span class=\"mt-2\">Rounded All</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/08.png')}}\" alt=\"pill-one-side\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/09.png')}}\" alt=\"pill-one-side\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill\">
                <span class=\"mt-2\">Pill One Side</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/09.png')}}\" alt=\"pill-all\" class=\"mode dark-img img-fluid btn-border p-0 flex-column\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill-all\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/08.png')}}\" alt=\"pill-all\" class=\"mode light-img img-fluid btn-border p-0 flex-column\" data-setting=\"sidebar\" data-name=\"sidebar-item\" data-value=\"navs-pill-all\">
                <span class=\"mt-2\">Pill All</span>
              </div>
            </div>
            <hr class=\"hr-horizontal\">
             <h5 class=\"mt-4 mb-3\">Navbar Style</h5>
            <div class=\"d-grid gap-3 grid-cols-2 \">
              <div class=\" text-center\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/11.png')}}\" alt=\"image\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"nav-glass\">
                <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/10.png')}}\" alt=\"image\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"nav-glass\">
                <span class=\"mt-2\">Glass</span>
              </div>
              <div class=\"text-center\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/10.png')}}\" alt=\"color\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar-header\" data-name=\"navbar-type\" data-value=\"navs-bg-color\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/11.png')}}\" alt=\"color\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar-header\" data-name=\"navbar-type\" data-value=\"navs-bg-color\">
                <span class=\"mt-2\">Color</span>
              </div>
              <div class=\" text-center\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/12.png')}}\" alt=\"sticky\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-sticky\">
                 <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/12.png')}}\" alt=\"sticky\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-sticky\">
                <span class=\"mt-2\">Sticky</span>
              </div>
              <div class=\"text-center\">
                  <img src=\"{{ base_url('Vendor/Template/assets/images/settings/dark/13.png')}}\" alt=\"transparent\" class=\"mode dark-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-transparent\">
                  <img src=\"{{ base_url('Vendor/Template/assets/images/settings/light/13.png')}}\" alt=\"transparent\" class=\"mode light-img img-fluid btn-border p-0 flex-column mb-2\" data-setting=\"navbar\" data-target=\".iq-navbar\" data-name=\"navbar-type\" data-value=\"navs-transparent\">
                <span class=\"mt-2\">Transparent</span>
              </div>
              <div class=\"btn btn-border active col-span-full mt-4 d-block\" data-setting=\"navbar\" data-name=\"navbar-default\" data-value=\"default\">
                <span class=\"\"> Default Navbar</span>
              </div>
            </div>-->
          </div>
        </div>
      </div>
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
