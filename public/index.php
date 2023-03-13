<?php

declare(strict_types = 1);

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\TablesController;
use App\Controllers\DishController;
use App\Models\Tables;
use App\Models\Produce;

//const BASE_PATH = __DIR__ . '/../';

require_once __DIR__ . '/../vendor/autoload.php';
define('VIEW_PATH', __DIR__ . '/../views/');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router
    ->get('/', [new HomeController(), 'index'])
    ->post('/sit', [new TablesController(new Tables), 'seats'])
    ->post('/sit/seated', [new TablesController(new Tables), 'chooseTable'])
    ->post('/sit/seated/choose', [new DishController(new Produce), 'chooseDish']);

$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);