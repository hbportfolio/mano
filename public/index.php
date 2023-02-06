<?php

declare(strict_types=1);

require __DIR__ . '/../app/Router.php';
require __DIR__ . '/../app/View.php';
require __DIR__ . '/../app/App.php';
require __DIR__ . '/../app/Controllers/HomeController.php';
require __DIR__ . '/../app/Controllers/AirlineController.php';
require __DIR__ . '/../app/Controllers/AirportController.php';


define('VIEW_PATH', __DIR__ . '/../app/Views');

$router = new Router();

$router
    ->get('/', [Home::class, 'index'])

    ->get('/airports', [Airport::class, 'index'])
    ->get('/airports/create', [Airport::class, 'create'])
    ->post('/airports/create', [Airport::class, 'store'])

    ->get('/airlines', [Airline::class, 'index'])
    ->get('/airlines/create', [Airline::class, 'create'])
    ->post('/airlines/create', [Airline::class, 'store'])

    ->get('/countries', [Country::class, 'index']);

(new App($router))->run();
