<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'authGuard']);
$routes->get('/admin/list', 'Admin::list', ['filter' => 'authGuard']);
$routes->get('/admin/register', 'Admin::register', ['filter' => 'authGuard']);
$routes->get('/admin/detail/(:any)', 'Admin::detail/$1', ['filter' => 'authGuard']);
$routes->get('/admin/edit/foto/(:any)', 'Admin::editFoto/$1', ['filter' => 'authGuard']);
$routes->get('/admin/edit/iar/(:any)', 'Admin::editIar/$1', ['filter' => 'authGuard']);
$routes->get('/admin/edit/kta/(:any)', 'Admin::editKta/$1', ['filter' => 'authGuard']);
$routes->get('/admin/edit/ktp/(:any)', 'Admin::editKtp/$1', ['filter' => 'authGuard']);
$routes->get('/admin/doEdit', 'Admin::doEdit', ['filter' => 'authGuard']);
$routes->get('/admin/doEditFoto', 'Admin::doEditFoto', ['filter' => 'authGuard']);
//$routes->get('/auth/valid_register', 'Auth::valid_register');
$routes->get('/user/verify', 'User::verify', ['filter' => 'authGuard']);
$routes->get('/user/doVerify', 'User::doVerify', ['filter' => 'authGuard']);
$routes->get('/admin/sort', 'Admin::sort', ['filter' => 'authGuard']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
