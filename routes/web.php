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



Route::get('/timer', [TimerController::class, 'index'])->name('timer')->middleware('autenticador');
Route::get('/ranking', [TimerController::class, 'ranking'])->name('ranking')->middleware('autenticador');
Route::post('/timer/total', [TimerController::class, 'updateTotalTime'])->name('form_update_time')->middleware('autenticador');
Route::get('/entrar', [EntrarController::class, 'index']);
Route::post('/entrar', [EntrarController::class, 'enter']);
Route::get('/register', [RegistroController::class, 'create']);
Route::post('/register', [RegistroController::class, 'store']);


Route::get('/sair', function(){
    Auth::logout();
    return redirect('/entrar');
});



