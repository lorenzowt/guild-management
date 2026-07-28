<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('heroes', HeroController::class);