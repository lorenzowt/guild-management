<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\QuestController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('heroes', HeroController::class);

Route::post('/heroes/{hero}/cure', [HeroController::class, 'cure'])->name('heroes.cure');

Route::get('/quests', [QuestController::class, 'index'])->name('quests.index');

Route::get('/quests/{quest}', [QuestController::class, 'show'])->name('quests.show');