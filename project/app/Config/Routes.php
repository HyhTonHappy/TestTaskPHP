<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('list-sub', 'ListSub::index'); 
$routes->get('phpinfo', 'PhpInfoController::index');
$routes->get('/addSub', 'addSub::index');
$routes->post('/addSub/store', 'addSub::store');
$routes->get('editSub/edit/(:num)', 'editSub::edit/$1');
$routes->post('editSub/update', 'editSub::update');
$routes->get('deleteSub/edit/(:num)', 'DeleteSub::delete/$1');
