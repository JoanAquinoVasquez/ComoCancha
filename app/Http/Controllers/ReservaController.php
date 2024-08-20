<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
        $reserva->estado = $estado;
        $reserva->user_id = $request->user()->id; // Asumiendo que el usuario está autenticado
        $reserva->cancha_id = $canchaId;
        $reserva->save();

        // Retornar una respuesta
        return response()->json([
            'success' => true,
            'message' => 'Reserva creada exitosamente.',
            'reserva' => $reserva
        ]);
    } 


    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json($reserva);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_reserva' => 'sometimes|required|date',
            'hora_inicio' => 'sometimes|required|time',
            'hora_fin' => 'sometimes|required|time',
            'estado' => 'sometimes|required|integer',
            'cliente_id' => 'sometimes|required|exists:cliente,id',
            'cancha_id' => 'sometimes|required|exists:cancha,id',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($validatedData);
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return response()->json(null, 204);
    }
}
