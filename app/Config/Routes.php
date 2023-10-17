<?php

namespace Config;

use App\Libraries\Twig;

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
$routes->set404Override(function () {
    $twigLibrary = new Twig();
    $twigLibrary->display('errors/error404');
});
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

$routes->get('', 'Pruebas::admindex');

// Rutas auth
$routes->group(
    'auth',
    ['namespace' => 'App\Controllers\Auth'],
    function ($routes) {
        $routes->get('login', 'Login::loginView');
        $routes->post('sing-in', 'Login::loginAction');
        $routes->get('logout', 'Login::logoutAction');
        $routes->get('passwordreset', 'Login::passwordResetView');
    }
);

// Rutas Accounts
$routes->group(
    'accounts',
    ['namespace' => 'App\Controllers\Accounts'],
    function ($routes) {
        $routes->get('profile', 'Profile::profile');
        $routes->post('change-password', 'Profile::changePassword');
    }
);

// Rutas aspirantes
$routes->group(
    'aspirantes',
    ['namespace' => 'App\Controllers\Aspirantes'],
    function ($routes) {
        $routes->get('registro', 'Aspirantes::formRegister');
        $routes->get('acreditado', 'Aspirantes::pagadoModulo'); //Ruta de pago acreditado
        $routes->post('insert', 'Aspirantes::post');
        $routes->get('delete/(:num)', 'Aspirantes::delete/$1'); // Esta ruta no debe ser publica (eliminado logico)
        $routes->post('change-status-payment', 'Aspirantes::changeStatusPayment'); // Esta ruta no debe ser publica
        $routes->post('ficha', 'Aspirantes::getfichaAspirante');
        $routes->get('data', 'Aspirantes::getDatosAspirante');
        $routes->get('recibo', 'Aspirantes::getReciboAspirante');
        $routes->group(
            '',
            ['namespace' => 'App\Controllers\Aspirantes',
                'filter' => 'group:aspirante'],// LINEA COMENTADA PARA PERMITIR EL ACCESO
            function ($routes) {
                $routes->get('', 'Aspirantes::index');
            }
        );

        $routes->group(
            'test',
            ['namespace' => 'App\Controllers\Aspirantes\Test'],
            function ($routes) {
                $routes->get('new', 'AspirantesTest::simulateFormInsert');
                $routes->get('delete/(:num)', 'AspirantesTest::delete/$1'); // Eliminado fisico
                $routes->get('send-email', 'AspirantesTest::sendEmail');
                $routes->get('export-pdf', 'AspirantesTest::exportPdf');
                $routes->get('export-excel', 'AspirantesTest::exportExcel');
                $routes->get('final-registro', 'AspirantesTest::finalizacionAspirantes');
            }
        );
    }
);

// Rutas de servicios financieros
$routes->group(
    'financieros',
    ['namespace' => 'App\Controllers\Financieros'],
    // 'filter' => 'group:recursos_financieros'],  // LINEA COMENTADA PARA PERMITIR EL ACCESO
    function ($routes) {
        $routes->get('aspirantes', 'Financieros::listAspirantes');
    }
);

// Desarrollo academico
$routes->group(
    'des-academico',
    ['namespace' => 'App\Controllers\DesarrolloAcademico',
        'filter' => 'group:desarrollo_academico'],  // LINEA COMENTADA PARA PERMITIR EL ACCESO
    function ($routes) {
        // Rutas para trabajar con los aspirantes dentro de desarrollo academico
        $routes->group(
            'aspirantes',
            ['namespace' => 'App\Controllers\DesarrolloAcademico',
                'filter' => 'group:desarrollo_academico'],
            function ($routes) {
                // ¿Seria bueno crear un controller aspirantes para el area de desarrollo academico?
                $routes->get('lista', 'DesarrolloAcademico::listAspirantes');
                $routes->get('exportar-reporte', 'DesarrolloAcademico::exportAcademicDevReport');
            }
        );
    }
);

// Rutas de información
$routes->group(
    'informacion',
    ['namespace' => 'App\Controllers',
        'filter' => 'group:superadmin, permission:admin.setting'],
    function ($routes) {
        $routes->get('php', 'Informacion::index');
    }
);

// Rutas de prueba
$routes->group(
    'pruebas',
    ['namespace' => 'App\Controllers\Test'],
    function ($routes) {
        $routes->get('correos', 'Pruebas::correo');
        $routes->post('sendEmail', 'Pruebas::sendEmail');
        $routes->get('imagenes', 'Pruebas::img');
        $routes->post('thumb', 'Pruebas::thumb');
        $routes->get('curl', 'Pruebas::curl');
        $routes->post('getPokemon', 'Pruebas::getDataPokemon');

        // Indice para administradores, para mayor conveniencia de usted y mia wink wink
        $routes->get('admindex', 'Pruebas::admindex');

        // Usuarios
        $routes->get('login/(:any)', 'Pruebas::login/$1');
        $routes->get('logout', 'Pruebas::logout');
        $routes->get('newuser/(:any)', 'Pruebas::newuser/$1');
        $routes->get('deleteuser/(:any)', 'Pruebas::deleteuser/$1');
        $routes->get('addgrouplogged/(:any)', 'Pruebas::addgrouplogged/$1');
        $routes->get('addgroup/(:any)/(:any)', 'Pruebas::addgroup/$1/$2');
        $routes->get('allusers', 'Pruebas::allusers');
        $routes->get('superadmin', 'Pruebas::superadmin');

        $routes->get('testpost', 'Pruebas::testpost');
        $routes->get('reticulas', 'Pruebas::reticulas');
    }
);

// Rutas de preguntas
$routes->group(
    'preguntas',
    ['namespace' => 'App\Controllers'],
    function ($routes) {
        $routes->get('', 'Preguntas::preguntasFrecuentes');
    }
);

// Rutas de ejemplo de servicios escolares
$routes->group(
    'servicios',
    ['namespace' => 'App\Controllers\ServiciosEscolares'],
    function ($routes) {
        $routes->get('carreras', 'Carreras::listCarreras');
        $routes->get('materias', 'Asignaturas::listMaterias');
    }
);

// Rutas para modulo de reticulas (test, dev)
$routes->group(
    'reticulas',
    ['namespace' => 'App\Controllers\Reticulas'],
    function ($routes) {
        $routes->get('reticula', 'Reticulas::reticulas');
        $routes->post('save-json-reticula', 'Reticulas::saveJsonReticula');

        // ASIGNTATURAS
        $routes->group(
            'asignaturas',
            ['namespace' => 'App\Controllers\Reticulas'],
            function ($routes) {
                // Return views
                $routes->get('new', 'Asignaturas::form');
                $routes->post('update', 'Asignaturas::form');

                // CRUD endpoints
                $routes->post('create', 'Asignaturas::create');
                $routes->post('update', 'Asignaturas::update');
                $routes->post('delete', 'Asignaturas::delete');
                $routes->get('get/(:num)', 'Asignaturas::getByID/$1');
                $routes->get('get-all', 'Asignaturas::getAsignaturas');
                // Agregadas por werin
                $routes->post('get-basicas', 'Asignaturas::getAsignaturasBasicas');
                $routes->post('get-by-carrera', 'Asignaturas::getAsignaturasByCarrera');
                $routes->post('get-by-especialidad', 'Asignaturas::getAsignaturasByEspecialidad');
                $routes->post('get-by-clave', 'Asignaturas::getByClave');

                // TEST routes
                $routes->get('testid', 'Asignaturas::testID');
                $routes->get('show', 'Asignaturas::show');
            }
        );

        // CARRERAS
        $routes->group(
            'carreras',
            ['namespace' => 'App\Controllers\Reticulas'],
            function ($routes) {
                $routes->get('show', 'Carreras::show');
                $routes->get('new', 'Carreras::form');
                $routes->post('update', 'Carreras::form');
                $routes->post('save', 'Carreras::save');
                $routes->post('delete', 'Carreras::delete');
                $routes->get('testid', 'Carreras::testID');
                $routes->get('get/(:num)', 'Carreras::getByID/$1');
            }
        );

        //ESPECIALIDADES
        $routes->group(
            'especialidades',
            ['namespace' => 'App\Controllers\Reticulas'],
            function ($routes) {
                $routes->get('show', 'Especialidades::show');
                $routes->get('new', 'Especialidades::form');
                $routes->post('update', 'Especialidades::form');
                $routes->post('save', 'Especialidades::save');
                $routes->post('delete', 'Especialidades::delete');
                $routes->get('testid', 'Especialidades::testID');
                $routes->get('get/(:num)', 'Especialidades::getByID/$1');
            }
        );

        // RETICULAS
        $routes->group(
            'reticulas',
            ['namespace' => 'App\Controllers\Reticulas'],
            function ($routes) {
                $routes->get('show', 'Reticulas::show');
                $routes->get('new', 'Reticulas::form');
                $routes->post('update', 'Reticulas::form');
                $routes->post('save', 'Reticulas::save');
                $routes->post('delete', 'Reticulas::delete');
                $routes->get('testid', 'Reticulas::testID');
                $routes->get('get/(:num)', 'Reticulas::getByID/$1');
                $routes->get('publish', 'Reticulas::publishReticula');
            }
        );
    }

    // RUTAS DE ALUMNOS
);

$routes->group(
    'alumnos',
    ['namespace' => 'App\Controllers\Alumnos'],
    function ($routes) {
        $routes->get('', 'Alumnos::alumno');
    }
);
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
