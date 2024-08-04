<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deportes = Deporte::all();
        return response()->json($deportes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $deporte = Deporte::create($validatedData);
        return response()->json($deporte, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $deporte = Deporte::findOrFail($id);
        return response()->json($deporte);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
        ]);

        $deporte = Deporte::findOrFail($id);
        $deporte->update($validatedData);
        return response()->json($deporte);
    }

    public function destroy($id)
    {
        $deporte = Deporte::findOrFail($id);
        $deporte->delete();
        return response()->json(null, 204);
    }
}
