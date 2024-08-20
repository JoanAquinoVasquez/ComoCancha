<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json($reservas);
    }

    public function getAvailableHours(Request $request)
    {
        $dia = $request->input('dia');
        $cancha_id = $request->input('cancha_id');

        // Obtener el horario para el día y cancha seleccionados
        $horario = Horario::where('dia', $dia)
            ->where('cancha_id', $cancha_id)
            ->first();

        if ($horario) {
            $start_time = new \DateTime($horario->hora_inicio);
            $end_time = new \DateTime($horario->hora_fin);

            // Obtener las horas reservadas para esa cancha y día
            $reservas = Reserva::where('cancha_id', $cancha_id)
                ->whereDate('dia', $dia)
                ->pluck('hora'); // Supongo que tienes un campo 'hora' en la tabla 'reserva'

            $available_hours = [];

            while ($start_time <= $end_time) {
                $current_hour = $start_time->format('H:i');

                // Agregar la hora al array de horas disponibles si no está en las reservas
                if (!$reservas->contains($current_hour)) {
                    $available_hours[] = $current_hour;
                }

                $start_time->modify('+1 hour'); // Incrementa de hora en hora
            }

            return response()->json($available_hours);
        } else {
            return response()->json([], 404); // No se encontró horario
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i:s',
            'hora_fin' => 'required|date_format:H:i:s',
            'estado' => 'required|integer',
            'user_id' => 'required|exists:user,id',
            'cancha_id' => 'required|exists:cancha,id',
        ]);

        $reserva = Reserva::create($validatedData);
        return response()->json($reserva, 201);
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
