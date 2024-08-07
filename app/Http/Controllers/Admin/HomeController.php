<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cancha;
use App\Models\Deporte;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\Sede;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        //  $canchas = Canchas::all();
        // Devolver la vista 'dashboard' con los datos necesarios

        return view('admin.index');

    }

    public function showDashboard()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            $user = Auth::user();

            // Verificar si el usuario tiene el rol de cliente
            if ($user->hasRole('Cliente')) {
                return redirect()->route('Cliente.inicio');
            }

            if ($user->hasRole(['Administrador', 'Dueño'])) {
                $totalCanchas = $user->canchas()->count();
                $numSedes = Sede::count();
                $numHorarios = Horario::count();

                return view('admin.index', [
                    'totalCanchas' => $totalCanchas,
                    'numSedes' => $numSedes,
                    'numHorarios' => $numHorarios,
                ]);
            }
        } else {
            // Redirigir al usuario a la página de inicio de sesión si no está autenticado
            return redirect()->route('login');
        }
        // Devolver la vista 'dashboard' con los datos necesarios
    }
    public function showMisCanchas()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $canchas = $user->canchas()->with('precio')->get();
            $deportes = Deporte::all();
            $sedes = Sede::where('user_id', $user->id)->get();
            return view('admin.miscanchas', ['canchas' => $canchas, 'deportes' => $deportes, 'sedes' => $sedes]);
        } else {
            return redirect()->route('login');
        }
    }
    public function showHorarios()
    {
        $horarios = Horario::all();
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.horarios', ['horarios' => $horarios]);
    }
    public function showDeportes()
    {
        $deportes = Deporte::all();
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.deportes', ['deportes' => $deportes]);
    }
    public function showSedes()
    {
        $sedes = Sede::all();
        return view('admin.sedes', ['sedes' => $sedes]);
    }
    public function showReservas()
    {
        $reservas = Reserva::all();
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.reservas', ['reservas' => $reservas]);
    }
    public function showClientes()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.clientes');
    }
    public function showUsuarios()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.usuarios');
    }
    public function showServicios()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.servicios');
    }
    public function showSuperficies()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.superficies');
    }
    public function showInicio()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        $canchas = Cancha::all();
        return view('Cliente.inicio', compact('canchas'));
    }
    public function showNosotros()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.nosotros');
    }
}
