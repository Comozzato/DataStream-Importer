<?php

use App\Core\Route;
use App\Home\HomeController;
use App\Modules\Users\UserController;

Route::get('/users', [UserController::class, 'listUsers']);

Route::get('/', [HomeController::class, 'hello']);