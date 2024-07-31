<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanEstrategicoController;
use App\Http\Controllers\ObjetivoEstrategicoController;
use App\Http\Controllers\AnalisisInternoController;
use App\Http\Controllers\AnalisisExternoController;
use App\Http\Controllers\EstrategiaController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\Admin\HomeController;
use App\Actions\Fortify\CreateNewUser;
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

// Route::get('/register', function () {
//     return view('auth.register');
// })->middleware('auth')->name('register');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas protegidas por autenticación
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [HomeController::class, 'showDashboard'])->name('dashboard');
    Route::get('/planes', [PlanEstrategicoController::class, 'index'])->name('planes.index');
    Route::get('/planes/create', [PlanEstrategicoController::class, 'create'])->name('planes.create');
    Route::post('/planes', [PlanEstrategicoController::class, 'store'])->name('planes.store');
    Route::get('/planes/{id}', [PlanEstrategicoController::class, 'show'])->name('planes.show');
    Route::get('/planes/{id}/edit', [PlanEstrategicoController::class, 'edit'])->name('planes.edit');
    Route::put('/planes/{id}', [PlanEstrategicoController::class, 'update'])->name('planes.update');
    Route::delete('/planes/{id}', [PlanEstrategicoController::class, 'destroy'])->name('planes.destroy');

    // Rutas para Objetivo Estratégico
    Route::get('/objetivos', [ObjetivoEstrategicoController::class, 'index'])->name('objetivos.index');
    Route::get('/objetivos/create', [ObjetivoEstrategicoController::class, 'create'])->name('objetivos.create');
    Route::post('/objetivos', [ObjetivoEstrategicoController::class, 'store'])->name('objetivos.store');
    Route::get('/objetivos/{id}', [ObjetivoEstrategicoController::class, 'show'])->name('objetivos.show');
    Route::get('/objetivos/{id}/edit', [ObjetivoEstrategicoController::class, 'edit'])->name('objetivos.edit');
    Route::put('/objetivos/{id}', [ObjetivoEstrategicoController::class, 'update'])->name('objetivos.update');
    Route::delete('/objetivos/{id}', [ObjetivoEstrategicoController::class, 'destroy'])->name('objetivos.destroy');

    // Rutas para Análisis Interno
    Route::get('/analisis-interno', [AnalisisInternoController::class, 'index'])->name('analisis_internos.index');
    Route::get('/analisis-interno/create', [AnalisisInternoController::class, 'create'])->name('analisis_internos.create');
    Route::post('/analisis-interno', [AnalisisInternoController::class, 'store'])->name('analisis_internos.store');
    Route::get('/analisis-interno/{id}', [AnalisisInternoController::class, 'show'])->name('analisis_internos.show');
    Route::get('/analisis-interno/{id}/edit', [AnalisisInternoController::class, 'edit'])->name('analisis_internos.edit');
    Route::put('/analisis-interno/{id}', [AnalisisInternoController::class, 'update'])->name('analisis_internos.update');
    Route::delete('/analisis-interno/{id}', [AnalisisInternoController::class, 'destroy'])->name('analisis_internos.destroy');

    // Rutas para Análisis Externo
    Route::get('/analisis-externo', [AnalisisExternoController::class, 'index'])->name('analisis_externos.index');
    Route::get('/analisis-externo/create', [AnalisisExternoController::class, 'create'])->name('analisis_externos.create');
    Route::post('/analisis-externo', [AnalisisExternoController::class, 'store'])->name('analisis_externos.store');
    Route::get('/analisis-externo/{id}', [AnalisisExternoController::class, 'show'])->name('analisis_externos.show');
    Route::get('/analisis-externo/{id}/edit', [AnalisisExternoController::class, 'edit'])->name('analisis_externos.edit');
    Route::put('/analisis-externo/{id}', [AnalisisExternoController::class, 'update'])->name('analisis_externos.update');
    Route::delete('/analisis-externo/{id}', [AnalisisExternoController::class, 'destroy'])->name('analisis_externos.destroy');

    // Rutas para Estrategia
    Route::get('/estrategias', [EstrategiaController::class, 'index'])->name('estrategias.index');
    Route::get('/estrategias/create', [EstrategiaController::class, 'create'])->name('estrategias.create');
    Route::post('/estrategias', [EstrategiaController::class, 'store'])->name('estrategias.store');
    Route::get('/estrategias/{id}', [EstrategiaController::class, 'show'])->name('estrategias.show');
    Route::get('/estrategias/{id}/edit', [EstrategiaController::class, 'edit'])->name('estrategias.edit');
    Route::put('/estrategias/{id}', [EstrategiaController::class, 'update'])->name('estrategias.update');
    Route::delete('/estrategias/{id}', [EstrategiaController::class, 'destroy'])->name('estrategias.destroy');

    // Rutas para Indicador
    Route::get('/indicadores', [IndicadorController::class, 'index'])->name('indicadores.index');
    Route::get('/indicadores/create', [IndicadorController::class, 'create'])->name('indicadores.create');
    Route::post('/indicadores', [IndicadorController::class, 'store'])->name('indicadores.store');
    Route::get('/indicadores/{id}', [IndicadorController::class, 'show'])->name('indicadores.show');
    Route::get('/indicadores/{id}/edit', [IndicadorController::class, 'edit'])->name('indicadores.edit');
    Route::put('/indicadores/{id}', [IndicadorController::class, 'update'])->name('indicadores.update');
    Route::delete('/indicadores/{id}', [IndicadorController::class, 'destroy'])->name('indicadores.destroy');

    // Rutas para Presupuesto
    Route::get('/presupuestos', [PresupuestoController::class, 'index'])->name('presupuestos.index');
    Route::get('/presupuestos/create', [PresupuestoController::class, 'create'])->name('presupuestos.create');
    Route::post('/presupuestos', [PresupuestoController::class, 'store'])->name('presupuestos.store');
    Route::get('/presupuestos/{id}', [PresupuestoController::class, 'show'])->name('presupuestos.show');
    Route::get('/presupuestos/{id}/edit', [PresupuestoController::class, 'edit'])->name('presupuestos.edit');
    Route::put('/presupuestos/{id}', [PresupuestoController::class, 'update'])->name('presupuestos.update');
    Route::delete('/presupuestos/{id}', [PresupuestoController::class, 'destroy'])->name('presupuestos.destroy');

    // Rutas para Evaluacion
    Route::get('/evaluaciones', [EvaluacionController::class, 'index'])->name('evaluaciones.index');
    Route::get('/evaluaciones/create', [EvaluacionController::class, 'create'])->name('evaluaciones.create');
    Route::post('/evaluaciones', [EvaluacionController::class, 'store'])->name('evaluaciones.store');
    Route::get('/evaluaciones/{id}', [EvaluacionController::class, 'show'])->name('evaluaciones.show');
    Route::get('/evaluaciones/{id}/edit', [EvaluacionController::class, 'edit'])->name('evaluaciones.edit');
    Route::put('/evaluaciones/{id}', [EvaluacionController::class, 'update'])->name('evaluaciones.update');
    Route::delete('/evaluaciones/{id}', [EvaluacionController::class, 'destroy'])->name('evaluaciones.destroy');

});
