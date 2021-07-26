<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\EpisodiosController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntrarController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/



Route::get( '/series',  [SeriesController::class, 'index'])->name('listar_series');
Route::get('/series/adicionar', [SeriesController::class, 'create'])->name('form_criar_serie');
Route::post('/series/adicionar', [SeriesController::class, 'store']);
Route::delete('/series/{id}', [SeriesController::class, 'destroy']);
Route::post('/series/{id}/editaNome', [SeriesController::class, 'editaNome']);
Route::get('/series/{serieId}/temporadas', [TemporadasController::class, 'index']);
Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'index']);
Route::post('/temporadas/{temporada}/episodios/assistir', [EpisodiosController::class, 'assistir']);
//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/entrar', [EntrarController::class, 'index']);
Route::post('/entrar', [EntrarController::class, 'entrar']);



