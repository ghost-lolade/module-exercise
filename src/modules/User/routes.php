<?php

use Illuminate\Support\Facades\Route;
use Modules\User\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/disable/{user}', [UserController::class, 'disable']);
Route::post('/users/enable/{user}', [UserController::class, 'enable']);
