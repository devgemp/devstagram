<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register.index');
