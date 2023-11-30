<?php

use App\Http\Controllers\EquiposCOntroller;
use App\Http\Controllers\torneoController;
use App\Http\Controllers\PersonaController;
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

// ############## TORNEO ENDPOINTS ##############
Route::get('/torneos', [torneoController::class, 'torneosHome'])->name('torneos.home');
Route::get('/torneos/nuevo', [torneoController::class, 'nuevo'])->name('torneos.nuevo');
Route::get('/torneos/agregarequipo', [torneoController::class, 'agregarequipo'])->name('torneos.agregarequipo');
Route::post('/torneos/guardar', [torneoController::class, 'guardar'])->name('torneos.guardar');
Route::post('/torneos/actualizar', [torneoController::class, 'actualizar'])->name('torneos.actualizar');
Route::get('/torneos/editar/{id}', [torneoController::class, 'torneoEdit'])->name('torneos.edit');
Route::get('/torneos/eliminar/{id}', [torneoController::class, 'torneoEliminar'])->name('torneos.eliminar');
Route::get('/torneos/clasificatoria/{id}', [torneoController::class, 'clasificatoria'])->name('torneos.clasificatoria');
Route::get('/torneo/{id}', [torneoController::class, 'torneoHome'])->name('torneo.home');

// ############## equipos ENDPOINTS ##############

Route::get('/equipos', [EquiposCOntroller::class, 'equiposHome'])->name('equipos.home');
Route::get('/equipos/nuevo', [EquiposCOntroller::class, 'nuevoEquipo'])->name('equipos.nuevo');
Route::post('/equipos/guardar', [EquiposCOntroller::class, 'guardarEquipo'])->name('equipos.guardar');
Route::get('/equipos/eliminar/{idEquipo}', [EquiposCOntroller::class, 'eliminarEquipo'])->name('equipos.eliminar');

Route::get('/torneo/{id}/equipos/editar/{idEquipo}', [EquiposCOntroller::class, 'editarEquipo'])->name('equipos.editar');
Route::post('/torneo/{id}/equipos/actualizar', [EquiposCOntroller::class, 'actualizarEquipo'])->name('equipos.actualizar');

// ############## persona ENDPOINTS ##############

Route::get('/persona/crear', [PersonaController::class, 'crearPersona'])->name('persona.crear');
Route::post('/persona/guardar', [PersonaController::class, 'guardarPersona'])->name('persona.guardar');
Route::get('/jugadores', function () {
    return view('jugadores');
})->name('jugadores');
Route::get('/historialDeJugador', function () {
    return view('historialDeJugador');
    
});
