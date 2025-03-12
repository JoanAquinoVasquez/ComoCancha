<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\DeporteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SedeController;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\ReservaController;

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

Route::get('/', [HomeController::class, 'showInicio'])->name('Cliente.inicio');
Route::get('/nosotros', [HomeController::class, 'showNosotros'])->name('Cliente.nosotros');

Route::get('/nosotros', [HomeController::class, 'showNosotros'])->name('Cliente.nosotros');
Route::get('/cancha/{id}', [HomeController::class, 'showCancha'])->name('Cliente.cancha');
Route::get('/contacto', [HomeController::class, 'showContacto'])->name('Cliente.contacto');

Route::post('/get-available-hours', [CanchaController::class, 'getAvailableHours'])->name('get.available.hours');


// Rutas protegidas por autenticación
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home')->middleware('can:Administrador,Dueño');
    Route::get('/dashboard', [HomeController::class, 'showDashboard'])->name('dashboard');
    Route::get('/miscanchas', [HomeController::class, 'showMisCanchas'])->name('miscanchas');
    Route::get('/horarios', [HomeController::class, 'showHorarios'])->name('horarios')->middleware('can:Administrador,Dueño');
    Route::get('/deportes', [HomeController::class, 'showDeportes'])->name('deportes')->middleware('can:Administrador,Dueño');
    Route::get('/sedes', [HomeController::class, 'showSedes'])->name('sedes')->middleware('can:Administrador,Dueño');
    Route::get('/usuarios', [HomeController::class, 'showUsuarios'])->name('usuarios')->middleware('can:Administrador,Dueño');

    Route::post('/miscanchas', [CanchaController::class, 'store'])->name('canchas.store')->middleware('can:Administrador,Dueño');
    Route::get('/miscanchas/{id}', [CanchaController::class, 'show'])->middleware('can:Administrador,Dueño');
    Route::put('/miscanchas/{id}', [CanchaController::class, 'update'])->name('canchas.update')->middleware('can:Administrador,Dueño');
    Route::delete('/miscanchas/{id}', [CanchaController::class, 'destroy'])->name('miscanchas.destroy')->middleware('can:Administrador,Dueño');

    Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store')->middleware('can:Administrador,Dueño');
    Route::get('/horarios/{id}', [HorarioController::class, 'show'])->middleware('can:Administrador,Dueño');
    Route::put('/horarios/{id}', [HorarioController::class, 'update'])->name('horarios.update')->middleware('can:Administrador,Dueño');
    Route::delete('/horarios/{id}', [HorarioController::class, 'destroy'])->name('horarios.destroy')->middleware('can:Administrador,Dueño');

    Route::post('/deportes', [DeporteController::class, 'store'])->name('deportes.store')->middleware('can:Administrador,Dueño');
    Route::get('/deportes/{deporte}', [DeporteController::class, 'show'])->name('deportes.show')->middleware('can:Administrador,Dueño');
    Route::put('/deportes/{deporte}', [DeporteController::class, 'update'])->name('deportes.update')->middleware('can:Administrador,Dueño');
    Route::delete('/deportes/{deporte}', [DeporteController::class, 'destroy'])->name('deportes.destroy')->middleware('can:Administrador,Dueño');

    // Rutas para el CRUD de sedes
    Route::post('/sedes', [SedeController::class, 'store'])->name('sedes.store')->middleware('can:Administrador,Dueño');
    Route::get('/sedes/{sede}', [SedeController::class, 'show'])->name('sedes.show')->middleware('can:Administrador,Dueño');
    Route::put('/sedes/{sede}', [SedeController::class, 'update'])->name('sedes.update')->middleware('can:Administrador,Dueño');
    Route::delete('/sedes/{sede}', [SedeController::class, 'destroy'])->name('sedes.destroy')->middleware('can:Administrador,Dueño');


   // Route::get('/deportes', [HomeController::class, 'showDeportes'])->name('deportes');
    Route::get('/superficies', [HomeController::class, 'showSuperficies'])->name('superficies')->middleware('can:Administrador,Dueño');
    Route::get('/servicios', [HomeController::class, 'showServicios'])->name('servicios');
    Route::get('/clientes', [HomeController::class, 'showClientes'])->name('clientes')->middleware('can:Administrador,Dueño');
    Route::get('/reservas', [HomeController::class, 'showReservas'])->name('reservas');


    Route::post('/reservar', [ReservaController::class, 'store'])->name('reservar.store');


    Route::post('/reservas/actualizar/{id}', [ReservaController::class, 'update'])->name('reservas.update');

});