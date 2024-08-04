<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use Illuminate\Http\Request;

class CanchaController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();
        return response()->json($canchas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precioporhora' => 'required|numeric',
            'descripcion' => 'required|string',
            'user_id' => 'required|exists:user,id',
            'deporte_id' => 'required|exists:deporte,id',
        ]);

        $cancha = Cancha::create($validatedData);
        return response()->json($cancha, 201);
    }
    public function show($id)
    {
        $cancha = Cancha::findOrFail($id);
        return response()->json($cancha);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo' => 'sometimes|required|string|max:255',
            'ubicacion' => 'sometimes|required|string|max:255',
            'precioporhora' => 'sometimes|required|numeric',
            'descripcion' => 'sometimes|required|string',
            'user_id' => 'sometimes|required|exists:user,id',
            'deporte_id' => 'sometimes|required|exists:deporte,id',
        ]);

        $cancha = Cancha::findOrFail($id);
        $cancha->update($validatedData);
        return response()->json($cancha);
    }

    public function destroy($id)
    {
        $cancha = Cancha::findOrFail($id);
        $cancha->delete();
        return response()->json(null, 204);
    }
}
