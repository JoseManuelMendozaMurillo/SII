<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers\Auth');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('loginView');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('auth/login', 'Login::loginView');

service('auth')->routes($routes, ['except' => ['login']]);

// Rutas auth
$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function($routes){
    $routes->get('login', 'Login::loginView');
    $routes->post('sing-in', 'Login::loginAction');
    $routes->get('logout', 'Login::logoutAction');

    $routes->get('register', 'Register::registerView');
    $routes->post('sing-up', 'Register::registerAction');
});

// Rutas para el crud de alumnos
$routes->group(
                'alumno', 
                ['namespace' => 'App\Controllers', 
                'filter' => 'group:superadmin,master,student,bossdepartment, permission:admin.*,master.*,student.*,bossdepartment.*'], 
                function($routes){
    
    $routes->get('listado', 'Alumno::index');
    
    $routes->group(
        "",
        ['namespace' => 'App\Controllers',
         'filter' => 'group:superadmin,bossdepartment, permission:student.create,student.delete'],
        function($routes){
            $routes->get('form', 'Alumno::form');
            $routes->post('add', 'Alumno::add');
            $routes->get('delete/(:any)', 'Alumno::delete/$1');
        }
    );
    
    $routes->group(
        "",
        ['namespace' => 'App\Controllers',
         'filter' => 'group:superadmin,bossdepartment,master, permission:student.update'],
        function($routes){
            $routes->get('form/(:any)', 'Alumno::form/$1');
            $routes->post('update/(:any)', 'Alumno::update/$1');
            $routes->post('grupos', 'Alumno::grupos');
        }
    );
    
});

// Rutas de información
$routes->group('informacion', 
              ['namespace' => 'App\Controllers', 
               'filter' => 'group:superadmin, permission:admin.setting'], 
              function($routes){
    $routes->get('php', 'Informacion::index');
});

// Rutas de prueba
$routes->group('pruebas', 
                ['namespace' => 'App\Controllers\Test', 
                 'filter' => 'group:superadmin, permission:admin.setting'], 
                 function($routes){
    $routes->get('correos', 'Pruebas::correo');
    $routes->post('sendEmail', 'Pruebas::sendEmail');
    $routes->get('imagenes', 'Pruebas::img');
    $routes->post('thumb', 'Pruebas::thumb');
    $routes->get('curl', 'Pruebas::curl');
    $routes->post('getPokemon', 'Pruebas::getDataPokemon');
});

// Rutas de información
$routes->group('servicios', 
              ['namespace' => 'App\Controllers\ServiciosEscolares'], 
              function($routes){
    $routes->get('crear', 'ServiciosEscolares::crearReticula');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
