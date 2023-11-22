<?php

use App\Http\Controllers\torneoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/torneos', [torneoController::class, 'torneosHome'])->name('torneos.home');
Route::get('/torneos/nuevo', [torneoController::class, 'nuevo'])->name('torneos.nuevo');
Route::post('/torneos/guardar', [torneoController::class, 'guardar'])->name('torneos.guardar');
Route::post('/torneos/actualizar', [torneoController::class, 'actualizar'])->name('torneos.actualizar');
Route::get('/torneos/editar/{id}', [torneoController::class, 'torneoEdit'])->name('torneos.edit');
Route::get('/torneos/eliminar/{id}', [torneoController::class, 'torneoEliminar'])->name('torneos.eliminar');
Route::get('/torneos/clasificatoria/{id}', [torneoController::class, 'clasificatoria'])->name('torneos.clasificatoria');
Route::get('/torneo/{id}', [torneoController::class, 'torneoHome'])->name('torneo.home');
