<?php

declare(strict_types=1);

use App\Core\Route;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../App/Bootstrap.php';
require_once __DIR__ . '/../App/Core/Route.php';


Route::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
