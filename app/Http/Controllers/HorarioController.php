<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
    public function index(){
        $horarios = Horario::all();
        return response()->json($horarios);
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



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dia' => 'required|string|max:255',
            'hora_inicio' => ['required'],
            'hora_fin' => ['required'],
            'cancha_id' => 'required|exists:cancha,id',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('User not authenticated.');
        }
        $user = Auth::user();

        Horario::create([
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'cancha_id' => $request->cancha_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('horarios')->with('success', 'Horario creado exitosamente.');
    }
    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return response()->json($horario);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'dia' => 'required|string|max:255',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'cancha_id' => 'required|exists:cancha,id',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($validatedData);
        return redirect()->route('horarios')->with('success', 'Horario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horarios')->with('success', 'Horario eliminado exitosamente.');
    }
}
