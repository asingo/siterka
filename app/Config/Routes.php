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
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
$routes->get('/admin', 'Admin::index', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/list', 'Admin::list', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/register', 'Admin::register', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/detail/(:any)', 'Admin::detail/$1', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/edit/foto/(:any)', 'Admin::editFoto/$1', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/edit/iar/(:any)', 'Admin::editIar/$1', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/edit/kta/(:any)', 'Admin::editKta/$1', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/edit/ktp/(:any)', 'Admin::editKtp/$1', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/doEdit', 'Admin::doEdit', ['filter' => ['authGuard', 'adminGuard']]);
$routes->get('/admin/doEditFoto', 'Admin::doEditFoto', ['filter' => ['authGuard', 'adminGuard']]);
//$routes->get('/auth/valid_register', 'Auth::valid_register');
$routes->get('/user/verify', 'User::verify', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/confirm', 'User::confirm', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/detail', 'User::detail', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/edit/foto/(:any)', 'User::editFoto/$1', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/edit/iar/(:any)', 'User::editIar/$1', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/edit/kta/(:any)', 'User::editKta/$1', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/edit/ktp/(:any)', 'User::editKtp/$1', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/callbook', 'User::callbook', ['filter' => ['authGuard', 'userGuard']]);
$routes->get('/user/callbook/lihat/(:any)', 'User::detailCallbook/$1', ['filter' => ['authGuard', 'userGuard']]);
//$routes->get('/admin/sort', 'Admin::sort', ['filter' => 'authGuard']);
$routes->get('/error', 'BaseController::error', ['filter' => 'authGuard']);


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
