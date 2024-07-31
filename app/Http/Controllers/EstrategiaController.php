<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estrategia;

class EstrategiaController extends Controller
{
    public function index()
    {
        $estrategias = Estrategia::all();
        return view('estrategias.index', compact('estrategias'));
    }

    public function create()
    {
        // Muestra el formulario para crear una nueva estrategia
        return view('estrategias.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda la nueva estrategia
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Descripcion' => 'required|string',
            'Responsable' => 'required|string',
            'Recursos' => 'required|string',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
        ]);

        $estrategia = Estrategia::create($request->all());

        return redirect()->route('estrategias.show', $estrategia->IdEstrategia)
            ->with('success', 'Estrategia creada correctamente');
    }

    public function show($id)
    {
        $estrategia = Estrategia::findOrFail($id);
        return view('estrategias.show', compact('estrategia'));
    }

    public function edit($id)
    {
        $estrategia = Estrategia::findOrFail($id);
        return view('estrategias.edit', compact('estrategia'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza la estrategia
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Descripcion' => 'required|string',
            'Responsable' => 'required|string',
            'Recursos' => 'required|string',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
        ]);

        $estrategia = Estrategia::findOrFail($id);
        $estrategia->update($request->all());

        return redirect()->route('estrategias.show', $estrategia->IdEstrategia)
            ->with('success', 'Estrategia actualizada correctamente');
    }

    public function destroy($id)
    {
        $estrategia = Estrategia::findOrFail($id);
        $estrategia->delete();

        return redirect()->route('estrategias.index')
            ->with('success', 'Estrategia eliminada correctamente');
    }
}
