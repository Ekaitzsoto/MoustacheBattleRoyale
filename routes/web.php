<?php

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

Route::get('/', [\App\Http\Controllers\GuerraController::class, 'index']);
Route::get('/guerra', [\App\Http\Controllers\GuerraController::class, 'show']);
Route::get('/guerra/nueva', [\App\Http\Controllers\GuerraController::class, 'create']);
Route::post('/guerra/nueva', [\App\Http\Controllers\GuerraController::class, 'store']);
Route::post('/guerra/{id}/estado', [\App\Http\Controllers\GuerraController::class, 'update']);
