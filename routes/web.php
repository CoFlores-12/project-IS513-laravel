<?php

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

Route::get('/torneo/{id}/equipos', [torneoController::class, 'equiposHome'])->name('equipos.home');
Route::get('/torneo/{id}/equipos/nuevo', [torneoController::class, 'nuevoEquipo'])->name('equipos.nuevo');
Route::post('/torneo/{id}/equipos/guardar', [torneoController::class, 'guardarEquipo'])->name('equipos.guardar');
Route::get('/torneo/{id}/equipos/editar/{idEquipo}', [torneoController::class, 'editarEquipo'])->name('equipos.editar');
Route::post('/torneo/{id}/equipos/actualizar', [torneoController::class, 'actualizarEquipo'])->name('equipos.actualizar');
Route::get('/torneo/{id}/equipos/eliminar/{idEquipo}', [torneoController::class, 'eliminarEquipo'])->name('equipos.eliminar');

// ############## persona ENDPOINTS ##############

Route::get('/jugadores', [PersonaController::class, 'personasHome'])->name('persona.home');
Route::get('/persona/crear', [PersonaController::class, 'crearPersona'])->name('persona.crear');
//Route::get('/persona/eliminar', [PersonaController::class, 'eliminarPersona'])->name('persona.eliminar');
//Route::get('/persona/editar', [PersonaController::class, 'EditarEquipo'])->name('equipos.editar');
//route:post('/fichajeJugador',[PersonaController::class,'historialJugador])->('persona.actualizar);
/*
Route::get('/jugadores', function () {
    return view('jugadores');
});
 */
Route::get('/historialDeJugador', function () {
    return view('historialDeJugador');
    
});
Route::get('/fichajeJugador', function () {
    return view('fichajeJugador');
    
});

Route::get('/test', function () {
   return date('F, o'); 
});
