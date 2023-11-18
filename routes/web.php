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
Route::get('/torneo/{id}', [torneoController::class, 'torneoHome'])->name('torneo.home');
