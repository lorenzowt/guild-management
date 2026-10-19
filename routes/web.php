<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\GuildOverviewController;

Route::get('/', [GuildOverviewController::class, 'index'])
    ->name('guild-overview');

Route::resource('heroes', HeroController::class);

Route::post('/heroes/{hero}/cure', [HeroController::class, 'cure'])->name('heroes.cure');

Route::get('/quests', [QuestController::class, 'index'])->name('quests.index');

Route::get('/quests/{quest}', [QuestController::class, 'show'])->name('quests.show');

Route::resource('missions', MissionController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::post('missions/{mission}/complete', [MissionController::class, 'complete'])->name('missions.complete');

