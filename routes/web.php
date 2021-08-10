<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\EpisodiosController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntrarController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\TimerController;


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



Route::get( '/series',  [SeriesController::class, 'index'])->name('listar_series')->middleware('autenticador');
Route::get('/series/adicionar', [SeriesController::class, 'create'])->name('form_criar_serie')->middleware('autenticador');
Route::post('/series/adicionar', [SeriesController::class, 'store'])->middleware('autenticador');
Route::delete('/series/{id}', [SeriesController::class, 'destroy'])->middleware('autenticador');
Route::post('/series/{id}/editaNome', [SeriesController::class, 'editaNome'])->middleware('autenticador');
Route::get('/series/{serieId}/temporadas', [TemporadasController::class, 'index']);
Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'index']);
Route::post('/temporadas/{temporada}/episodios/assistir', [EpisodiosController::class, 'assistir'])->middleware('autenticador');
//Auth::routes();

Route::get('/timer', [TimerController::class, 'index'])->name('timer');
Route::get('/ranking', [TimerController::class, 'ranking'])->name('ranking');
Route::post('/timer/total', [TimerController::class, 'updateTotalTime'])->name('form_update_time')->middleware('autenticador');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [EntrarController::class, 'index']);
Route::post('/login', [EntrarController::class, 'entrar']);
Route::get('/register', [RegistroController::class, 'create']);
Route::post('/register', [RegistroController::class, 'store']);

Route::get('/sair', function(){
    Auth::logout();
    return redirect('/login');
});



