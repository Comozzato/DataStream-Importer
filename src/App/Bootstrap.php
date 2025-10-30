<?php

declare(strict_types=1);

namespace App;

use App\Core\Route;
use App\Providers\CassandraProvider;
use App\Providers\RouteProviders;

CassandraProvider::register();
RouteProviders::register();

Route::dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
