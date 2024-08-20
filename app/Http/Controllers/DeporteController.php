<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteController extends Controller
{
    public function index(){
        $deportes = Deporte::all();
        return response()->json($deportes);
    }

    public function show(Deporte $deporte){
        return response()->json($deporte);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $deporte = Deporte::create($validatedData);
        return redirect()->route('deportes')->with('success', 'Deporte creado con éxito.');

    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
        ]);

        $deporte = Deporte::findOrFail($id);
        $deporte->update($validatedData);
        return redirect()->route('deportes')->with('success', 'Deporte actualizado con éxito.');
    }

    public function destroy($id){
        $deporte = Deporte::findOrFail($id);
        $deporte->delete();
        return redirect()->route('deportes')->with('success', 'Deporte eliminado con éxito.');
    }
}
