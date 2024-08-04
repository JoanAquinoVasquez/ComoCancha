<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function index()
    {
        $sedes = Sede::all();
        return response()->json($sedes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|integer',
            'email' => 'nullable|string|email|max:255',
            'direccion' => 'required|string',
            'distrito_id' => 'required|exists:distrito,id',
        ]);

        $sede = Sede::create($validatedData);
        return response()->json($sede, 201);
    }
    public function show($id)
    {
        $sede = Sede::findOrFail($id);
        return response()->json($sede);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'telefono' => 'nullable|integer',
            'email' => 'sometimes|nullable|string|email|max:255',
            'direccion' => 'sometimes|required|string',
            'distrito_id' => 'sometimes|required|exists:distrito,id',
        ]);

        $sede = Sede::findOrFail($id);
        $sede->update($validatedData);
        return response()->json($sede);
    }

    public function destroy($id)
    {
        $sede = Sede::findOrFail($id);
        $sede->delete();
        return response()->json(null, 204);
    }
}