<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return response()->json($horarios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dia' => 'required|string|max:255',
            'hora_inicio' => 'required|time',
            'hora_fin' => 'required|time',
            'cancha_id' => 'required|exists:cancha,id',
            'user_id' => 'required|exists:user,id',
        ]);

        $horario = Horario::create($validatedData);
        return response()->json($horario, 201);
    }
    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return response()->json($horario);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'dia' => 'sometimes|required|string|max:255',
            'hora_inicio' => 'sometimes|required|time',
            'hora_fin' => 'sometimes|required|time',
            'cancha_id' => 'sometimes|required|exists:cancha,id',
            'user_id' => 'sometimes|required|exists:user,id',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($validatedData);
        return response()->json($horario);
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return response()->json(null, 204);
    }
}
