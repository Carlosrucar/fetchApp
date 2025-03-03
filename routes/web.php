<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'main']);
Route::resource('game', GameController::class)->except(['create', 'edit']);
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::post('register', [UserController::class, 'register'])->name('register');