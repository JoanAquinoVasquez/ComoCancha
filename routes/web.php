<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CanchaController;
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

Route::get('/', [HomeController::class, 'showInicio'])->name('Cliente.inicio');

Route::get('/nosotros', [HomeController::class, 'showNosotros'])->name('Cliente.nosotros');
Route::get('/cancha/{id}', [HomeController::class, 'showCancha'])->name('Cliente.cancha');
Route::get('/contacto', [HomeController::class, 'showContacto'])->name('Cliente.contacto');

Route::post('/get-available-hours', [CanchaController::class, 'getAvailableHours'])->name('get.available.hours');


// Rutas protegidas por autenticación
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [HomeController::class, 'showDashboard'])->name('dashboard');

    Route::get('/miscanchas', [HomeController::class, 'showMisCanchas'])->name('miscanchas');
    Route::post('/miscanchas', [CanchaController::class, 'store'])->name('canchas.store');
    Route::get('/miscanchas/{id}', [CanchaController::class, 'show']);
    Route::put('/miscanchas/{id}', [CanchaController::class, 'update'])->name('canchas.update');
    Route::delete('/miscanchas/{id}', [CanchaController::class, 'destroy'])->name('miscanchas.destroy');

    Route::get('/horarios', [HomeController::class, 'showHorarios'])->name('horarios');
    Route::get('/deportes', [HomeController::class, 'showDeportes'])->name('deportes');
    Route::get('/sedes', [HomeController::class, 'showSedes'])->name('sedes');
    Route::get('/superficies', [HomeController::class, 'showSuperficies'])->name('superficies');
    Route::get('/servicios', [HomeController::class, 'showServicios'])->name('servicios');
    Route::get('/usuarios', [HomeController::class, 'showUsuarios'])->name('usuarios');
    Route::get('/clientes', [HomeController::class, 'showClientes'])->name('clientes');
    Route::get('/reservas', [HomeController::class, 'showReservas'])->name('reservas');
});
