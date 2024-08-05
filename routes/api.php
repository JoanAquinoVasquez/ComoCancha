<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DeporteController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\HorarioController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Rutas para Departamento
Route::apiResource('departamentos', DepartamentoController::class);

// Rutas para Deporte
Route::apiResource('deportes', DeporteController::class);

// Rutas para Provincia
Route::apiResource('provincias', ProvinciaController::class);

// Rutas para Distrito
Route::apiResource('distritos', DistritoController::class);

// Rutas para Cancha
Route::apiResource('canchas', CanchaController::class);

// Rutas para Sede
Route::apiResource('sedes', SedeController::class);

// Rutas para Reserva
Route::apiResource('reservas', ReservaController::class);

// Rutas para Pago
Route::apiResource('pagos', PagoController::class);

// Rutas para Horario
Route::apiResource('horarios', HorarioController::class);

// Rutas para Galeria
Route::apiResource('galerias', GaleriaController::class);
