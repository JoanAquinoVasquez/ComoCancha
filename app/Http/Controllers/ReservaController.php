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