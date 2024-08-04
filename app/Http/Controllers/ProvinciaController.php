<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all();
        return response()->json($provincias);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamento,id',
        ]);

        $provincia = Provincia::create($validatedData);
        return response()->json($provincia, 201);
    }
    public function show($id)
    {
        $provincia = Provincia::findOrFail($id);
        return response()->json($provincia);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'departamento_id' => 'sometimes|required|exists:departamento,id',
        ]);

        $provincia = Provincia::findOrFail($id);
        $provincia->update($validatedData);
        return response()->json($provincia);
    }

    public function destroy($id)
    {
        $provincia = Provincia::findOrFail($id);
        $provincia->delete();
        return response()->json(null, 204);
    }
}
