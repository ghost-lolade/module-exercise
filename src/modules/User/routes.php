<?php

use Inertia\Inertia;
use Modules\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/disable/{user}', [UserController::class, 'disable']);
Route::post('/users/enable/{user}', [UserController::class, 'enable']);
Route::get('/user-management', function () {
    // $users = \App\Models\User::all();
    return Inertia::render('UserManagement');
});
