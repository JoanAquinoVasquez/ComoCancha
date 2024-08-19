<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
