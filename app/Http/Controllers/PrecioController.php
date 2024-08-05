<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $precios = Precio::all();
        return response()->json($precios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'cancha_id' => 'required|exists:canchas,id',
        ]);

        $precio = Precio::create($validatedData);
        return response()->json($precio, 201);
    }

    public function show($id)
    {
        $precio = Precio::findOrFail($id);
        return response()->json($precio);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'cancha_id' => 'required|exists:canchas,id',
        ]);

        $precio = Precio::findOrFail($id);
        $precio->update($validatedData);
        return response()->json($precio);
    }

    public function destroy($id)
    {
        $precio = Precio::findOrFail($id);
        $precio->delete();
        return response()->json(null, 204);
    }
}
