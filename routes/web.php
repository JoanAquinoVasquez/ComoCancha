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
    Route::get('/miscanchas', [HomeController::class, 'showMisCanchas'])->name('miscanchas');
    Route::get('/horarios', [HomeController::class, 'showHorarios'])->name('horarios');
    Route::get('/deportes', [HomeController::class, 'showDeportes'])->name('deportes');
    Route::get('/sedes', [HomeController::class, 'showSedes'])->name('sedes');
    Route::get('/superficies', [HomeController::class, 'showSuperficies'])->name('superficies');
    Route::get('/servicios', [HomeController::class, 'showServicios'])->name('servicios');
    Route::get('/usuarios', [HomeController::class, 'showUsuarios'])->name('usuarios');
    Route::get('/clientes', [HomeController::class, 'showClientes'])->name('clientes');
    Route::get('/reservas', [HomeController::class, 'showReservas'])->name('reservas');
    
    Route::get('/inicio', [HomeController::class, 'showInicio'])->name('Cliente.inicio');
    Route::get('/nosotros', [HomeController::class, 'showNosotros'])->name('Cliente.nosotros');


});
