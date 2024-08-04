<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function index()
    {
        $distritos = Distrito::all();
        return response()->json($distritos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'provincia_id' => 'required|exists:provincia,id',
        ]);

        $distrito = Distrito::create($validatedData);
        return response()->json($distrito, 201);
    }
    public function show($id)
    {
        $distrito = Distrito::findOrFail($id);
        return response()->json($distrito);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'provincia_id' => 'sometimes|required|exists:provincia,id',
        ]);

        $distrito = Distrito::findOrFail($id);
        $distrito->update($validatedData);
        return response()->json($distrito);
    }

    public function destroy($id)
    {
        $distrito = Distrito::findOrFail($id);
        $distrito->delete();
        return response()->json(null, 204);
    }
}
