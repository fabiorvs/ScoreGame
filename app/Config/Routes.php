<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/export', 'ExportController::index');

$routes->group('api', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->post('save-score', 'GameController::saveScore');
    $routes->post('get-top10', 'GameController::getTop10');
});
