<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json($reservas);
    }

    public function __construct()
    {
        $this->middleware('auth'); // Solo permite acceso a usuarios autenticados
    }

    public function store(Request $request)
    {
        \Log::info($request->all());
        if (!Auth::check()) {
            return response()->json(['error' => 'No autenticado'], 401); // Retorna un error si no está autenticado
        }

        // Obtener los datos de la solicitud
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $canchaId = $request->input('cancha_id');

        // Determinar el estado y la hora de fin
        $estado = 0; // Puedes cambiar esto según tu lógica
        $horaInicio = $hora;
        $horaFin = Carbon::parse($hora)->addHours(1)->format('H:i'); // Por ejemplo, una reserva de 1 hora
        \Log::info($horaInicio);
        \Log::info($horaFin);
        // Crear la reserva
        $reserva = new Reserva();
        $reserva->fecha_reserva = $fecha;
        $reserva->hora_inicio = $horaInicio;
        $reserva->hora_fin = $horaFin;
        if ($request->input('action') == 'confirmar') {
            $estado = 0;
        } else {
            $estado = 1;
        }
        $reserva->estado = $estado;
        $reserva->user_id = $request->user()->id; // Asumiendo que el usuario está autenticado
        $reserva->cancha_id = $canchaId;
        $reserva->save();

        // Retornar una respuesta
        return response()->json([
            'success' => true,
            'message' => 'Reserva creada exitosamente.',
            'reserva' => $reserva,
        ]);
    }

    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json($reserva);
    }

    public function update(Request $request, $id)
    {
        \Log::info($request->all());
        $reserva = Reserva::findOrFail($id);
        \Log::info($id);
        // Cambiar el estado de la reserva
        $reserva->estado = 1; // Cambiar el estado a 1
        $reserva->save(); // Guardar los cambios
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return response()->json(null, 204);
    }
}
