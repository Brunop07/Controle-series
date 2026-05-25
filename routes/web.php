<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodesController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('series.index');
})->middleware(Autenticador::class);

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])
    ->name('episodes.update');

Route::post('/seasons/{season}/episodes', function (\Illuminate\Http\Request $request, \App\Models\Season $season) {
    $episodesIds = $request->input('episodes', []);
    $season->episodes()->update(['watched' => false]);
    $season->episodes()->whereIn('id', $episodesIds)->update(['watched' => true]);

    return redirect()->route('seasons.index', $season->series_id);
})->name('episodes.update');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login.index');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');