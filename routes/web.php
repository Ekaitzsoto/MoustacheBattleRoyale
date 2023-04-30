<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GuerraController;
use \App\Http\Controllers\EquipoController;
use \App\Http\Controllers\JugadorController;
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

Route::get('/', [GuerraController::class, 'index']);
Route::get('/guerra', [GuerraController::class, 'show']);
Route::get('/guerra/nueva', [GuerraController::class, 'create']);
Route::post('/guerra/nueva', [GuerraController::class, 'store']);
Route::post('/guerra/{id}/estado', [GuerraController::class, 'update']);

Route::get('/equipo/nuevo', [EquipoController::class, 'create']);
Route::post('/equipo/nuevo', [EquipoController::class, 'store']);

Route::get('/jugador/nuevo', [JugadorController::class, 'create']);
Route::post('/jugador/nuevo', [JugadorController::class, 'store']);
