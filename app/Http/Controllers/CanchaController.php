<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanchaController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();
        return response()->json($canchas);
    }

    public function store(Request $request)
    {
       // $validatedData = $request->validate([
        $request->validate([
            'tipo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
      //      'user_id' => 'required|exists:user,id',
            'deporte_id' => 'required|exists:deporte,id',
            'sede_id' => 'required|exists:sede,id',
            'estado' => 'required|integer|in:0,1,2,3',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('User not authenticated.');
        }
        $user = Auth::user();

        Cancha::create([
            'tipo' => $request->tipo,
            'direccion' => $request->direccion,
            'descripcion' => $request->descripcion,
            'deporte_id' => $request->deporte_id,
            'sede_id' => $request->sede_id,
            'user_id' => $user->id,
            'estado' => $request->estado ?? 0,
        ]);
        return redirect()->route('miscanchas')->with('success', 'Cancha creada exitosamente.');
    }
    public function show($id)
    {
        $cancha = Cancha::with('precio')->findOrFail($id);
        return response()->json($cancha);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'deporte_id' => 'required|exists:deporte,id',
            'sede_id' => 'required|exists:sede,id',
            'estado' => 'required|integer|in:0,1,2,3',
        ]);

        $cancha = Cancha::findOrFail($id);
        $cancha->update($request->all());
        return redirect()->route('miscanchas')->with('success', 'Cancha actualizada exitosamente.');

//        return response()->json($cancha);
    }

    public function destroy($id)
    {
        $cancha = Cancha::findOrFail($id);
        $cancha->delete();
        return redirect()->route('miscanchas')->with('success', 'Cancha eliminada exitosamente.');

//        return response()->json(null, 204);
    }
}
