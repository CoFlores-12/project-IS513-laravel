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
Route::get('/torneo/jugar/{id}', [torneoController::class, 'jugar'])->name('torneos.jugar');

// ############## equipos ENDPOINTS ##############

Route::get('/equipos', [EquiposCOntroller::class, 'equiposHome'])->name('equipos.home');
Route::get('/equipo/{id}', [EquiposCOntroller::class, 'verEquipo'])->name('equipo.ver');
Route::get('/equipos/nuevo', [EquiposCOntroller::class, 'nuevoEquipo'])->name('equipos.nuevo');
Route::post('/equipos/guardar', [EquiposCOntroller::class, 'guardarEquipo'])->name('equipos.guardar');
Route::get('/equipos/eliminar/{idEquipo}', [EquiposCOntroller::class, 'eliminarEquipo'])->name('equipos.eliminar');
Route::post('/equipos/actualizar', [EquiposCOntroller::class, 'actualizarEquipo'])->name('equipos.actualizar');

Route::get('/equipo/{id}/jugadores', [EquiposCOntroller::class, 'jugadoresEquipo'])->name('equipo.jugadores');

Route::get('/torneo/{id}/equipos/editar/{idEquipo}', [EquiposCOntroller::class, 'editarEquipo'])->name('equipos.editar');
Route::post('/torneo/{id}/equipos/actualizar', [EquiposCOntroller::class, 'actualizarEquipo'])->name('equipos.actualizar');

// ############## persona ENDPOINTS ##############

Route::get('/personas/crear', [PersonaController::class, 'crearPersona'])->name('persona.crear');
Route::post('/persona/crear', [PersonaController::class, 'guardarPersona'])->name('persona.guardar');
Route::get('/jugadores', [PersonaController::class, 'verPersonas'])->name('jugadores');
Route::get('/persona/{id}',  [PersonaController::class, 'verPersona']);
Route::get('/persona/transferir/{id}',  [PersonaController::class, 'transferirPersona']);
Route::post('/persona/transferir',  [PersonaController::class, 'transferirPersonaPost']);
