<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cancha;
use App\Models\Deporte;
use App\Models\Distrito;
use App\Models\Horario;
use App\Models\Pago;
use App\Models\Reserva;
use App\Models\Sede;
use App\Models\User;
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
            $empresaId = $user->empresa_id; // Definir la variable $empresaId

            // Verificar si el usuario tiene el rol de cliente
            if ($user->hasRole('Cliente')) {
                return redirect()->route('reservas');
            }

            if ($user->hasRole(['Administrador', 'Dueño'])) {
                // Obtener el total de canchas que tiene la empresa a la que pertenece el usuario autenticado
                $totalCanchas = Cancha::whereHas('user', function ($query) use ($user) {
                    $query->where('empresa_id', $user->empresa_id);
                })->count();

                // Obtener el total de sedes que tiene la empresa a la que pertenece el usuario autenticado
                $numSedes = Sede::whereHas('user', function ($query) use ($empresaId) {
                    $query->where('empresa_id', $empresaId);
                })->count();

                // Obtener el total de horarios que tiene la empresa a la que pertenece el usuario autenticado
                $numHorarios = Horario::whereHas('cancha', function ($query) use ($empresaId) {
                    $query->whereHas('user', function ($query) use ($empresaId) {
                        $query->where('empresa_id', $empresaId);
                    });
                })->count();

                // Obtener el total de reservas que tiene la empresa a la que pertenece el usuario autenticado
                $numReservas = Reserva::whereHas('cancha', function ($query) use ($empresaId) {
                    $query->whereHas('user', function ($query) use ($empresaId) {
                        $query->where('empresa_id', $empresaId);
                    });
                })->count();

                // Obtener el total usuarios Clientes que hayan hecho reservas a canchas que pertenezcan al usuario autenticado
                $totalClientes = Reserva::whereHas('cancha', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->distinct('user_id')->count('user_id');

                // Obtener el total de Ganancias que ha tenido la empresa a la que pertenece el usuario autenticado,
                $totalGanancias = Pago::whereHas('reserva.cancha', function ($query) use ($empresaId) {
                    $query->whereHas('user', function ($query) use ($empresaId) {
                        $query->where('empresa_id', $empresaId);
                    });
                })->sum('monto');

                return view('admin.index', [
                    'totalCanchas' => $totalCanchas,
                    'numSedes' => $numSedes,
                    'numHorarios' => $numHorarios,
                    'numReservas' => $numReservas,
                    'totalClientes' => $totalClientes,
                    'totalGanancias' => $totalGanancias,
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
            $empresaId = $user->empresa_id; // Definir la variable $empresaId

            // Obtener todas las canchas de los usuarios que pertenezcan a la empresa a la que pertenece el usuario autenticado
            $canchasEmpresa = Cancha::whereHas('user', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })->with('precio')->get();

            $deportes = Deporte::all();

            // Obtener todas las sedes creadas por los usuarios que pertenecen a la empresa a la que pertenece el usuario autenticado
            $sedes = Sede::whereHas('user', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })->get();

            return view('admin.miscanchas', ['canchas' => $canchasEmpresa, 'deportes' => $deportes, 'sedes' => $sedes]);

        } else {
            return redirect()->route('login');
        }
    }
    public function showHorarios()
    {
        // Obtener todos los horarios de las canchas de la empresa a la que pertenece el usuario autenticado
        if (Auth::check()) {
            $user = Auth::user();
            $empresaId = $user->empresa_id; // Definir la variable $empresaId

            $horarios = Horario::whereHas('cancha', function ($query) use ($empresaId) {
                $query->whereHas('user', function ($query) use ($empresaId) {
                    $query->where('empresa_id', $empresaId);
                });
            })->get();

            $canchas = Cancha::whereHas('user', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })->get();

            $deportes = Deporte::all();

            $sedes = Sede::whereHas('user', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })->get();

            return view('admin.horarios', ['horarios' => $horarios, 'canchas' => $canchas, 'deportes' => $deportes, 'sedes' => $sedes]);
        } else {
            return redirect()->route('login');
        }
    }
    public function showDeportes()
    {
        $deportes = Deporte::all();
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.deportes', ['deportes' => $deportes]);
    }
    public function showSedes()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $empresaId = $user->empresa_id; // Definir la variable $empresaId

            // Obtener todas las sedes creadas por los usuarios que pertenecen a la empresa a la que pertenece el usuario autenticado
            $sedes = Sede::whereHas('user', function ($query) use ($empresaId) {
                $query->where('empresa_id', $empresaId);
            })->get();

            $distritos = Distrito::all();

            return view('admin.sedes', ['sedes' => $sedes, 'distritos' => $distritos]);
        } else {
            return redirect()->route('login');
        }
    }
    public function showReservas()
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        if ($user->hasRole('Cliente')) {
            // Si el usuario es un cliente, obtener solo las reservas asociadas a su ID de usuario
            $reservas = Reserva::where('user_id', $user->id)->get();
        } else {
            // Obtener todas las reservas de las canchas de la empresa a la que pertenece el usuario autenticado
            $reservas = Reserva::whereHas('cancha', function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('empresa_id', Auth::user()->empresa_id);
                });
            })->get();
        }
        return view('admin.reservas', ['reservas' => $reservas]);
    }
    public function showClientes()
    {
        // Obtener los usuarios que han hecho reservas a las canchas de la empresa a la que pertenece el usuario autenticado
        if (Auth::check()) {
            $user = Auth::user();
            $empresaId = $user->empresa_id; // Definir la variable $empresaId

            // Verificar si el usuario tiene el rol de Dueño o Administrador
            if ($user->hasRole('Dueño') || $user->hasRole('Administrador')) {
                $clientes = User::whereHas('reservas.cancha', function ($query) use ($empresaId) {
                    $query->whereHas('user', function ($query) use ($empresaId) {
                        $query->where('empresa_id', $empresaId);
                    });
                })->distinct()->get();

                return view('admin.clientes', ['clientes' => $clientes]);
            } else {
                return redirect()->route('home')->with('error', 'No tienes permiso para ver esta página.');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function showUsuarios()
    {
        // Obtener los usuarios que pertenecen a la empresa a la que pertenece el usuario autenticado, ademas del campo Rol que tiene asignado
        if (Auth::check()) {
            $user = Auth::user();
            $empresaId = $user->empresa_id; // Definir la variable $empresaId

            $usuarios = User::where('empresa_id', $empresaId)->with('roles')->get();

            return view('admin.usuarios', ['usuarios' => $usuarios]);
        } else {
            return redirect()->route('login');
        }
    }
    public function showMisCanchas()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.miscanchas');
    }
    public function showHorarios()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.horarios');
    }
    public function showDeportes()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.deportes');
    }
    public function showSedes()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.sedes');
    }
    public function showReservas()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.reservas');
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
        return view('Cliente.inicio');
    }
    public function showNosotros()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.nosotros');
    }

<<<<<<< HEAD
    public function showCancha()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.cancha');
    }
=======
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

    public function showCancha($id)
    {
        // Obtener la cancha por ID
        $cancha = Cancha::with(['galeria', 'precio'])->findOrFail($id);

        // Acceder a los datos relacionados
        $galeria = $cancha->galeria;
        $precios = $cancha->precio;
        $horarios = $cancha->horario;

        // Pasar los datos a la vista
        return view('Cliente.cancha', compact('cancha', 'galeria', 'precios', 'horarios'));
    }

    public function getAvailableHours(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'cancha_id' => 'required|integer|exists:canchas,id',
        ]);

        $fechaSeleccionada = $validated['fecha'];
        $canchaId = $validated['cancha_id'];

        $horarios = Horario::where('cancha_id', $canchaId)->get();
        $reservas = Reserva::whereDate('fecha_reserva', $fechaSeleccionada)
            ->where('cancha_id', $canchaId)
            ->get(['hora_inicio', 'hora_fin']);

        $horasDisponibles = [];

        foreach ($horarios as $horario) {
            $horaInicio = strtotime($horario->hora_inicio);
            $horaFin = strtotime($horario->hora_fin);

            $disponible = true;
            foreach ($reservas as $reserva) {
                $reservaInicio = strtotime($reserva->hora_inicio);
                $reservaFin = strtotime($reserva->hora_fin);

                if (($horaInicio < $reservaFin) && ($horaFin > $reservaInicio)) {
                    $disponible = false;
                    break;
                }
            }

            if ($disponible) {
                $horasDisponibles[] = $horario->hora_inicio . ' - ' . $horario->hora_fin;
            }
        }

        return response()->json($horasDisponibles);
    }

>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
    public function showContacto()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.contacto');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
