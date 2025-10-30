<?php

use App\Core\Route;
use App\Home\HomeController;
use App\Users\UserController;

Route::get('/users', [UserController::class, 'index']);

Route::get('/', [HomeController::class, 'hello']);