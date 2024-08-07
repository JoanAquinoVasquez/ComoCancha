<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjetivoEstrategico;

class ObjetivoEstrategicoController extends Controller
{
    public function index()
    {
        $objetivos = ObjetivoEstrategico::all();
        return view('objetivos.index', compact('objetivos'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo objetivo estratégico
        return view('objetivos.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda el nuevo objetivo estratégico
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Descripcion' => 'required|string',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Estado' => 'required|string',
        ]);

        $objetivo = ObjetivoEstrategico::create($request->all());

        return redirect()->route('objetivos.show', $objetivo->IdObjetivo)
            ->with('success', 'Objetivo estratégico creado correctamente');
    }

    public function show($id)
    {
        $objetivo = ObjetivoEstrategico::findOrFail($id);
        return view('objetivos.show', compact('objetivo'));
    }

    public function edit($id)
    {
        $objetivo = ObjetivoEstrategico::findOrFail($id);
        return view('objetivos.edit', compact('objetivo'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza el objetivo estratégico
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Descripcion' => 'required|string',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'required|date',
            'Estado' => 'required|string',
        ]);

        $objetivo = ObjetivoEstrategico::findOrFail($id);
        $objetivo->update($request->all());

        return redirect()->route('objetivos.show', $objetivo->IdObjetivo)
            ->with('success', 'Objetivo estratégico actualizado correctamente');
    }

    public function destroy($id)
    {
        $objetivo = ObjetivoEstrategico::findOrFail($id);
        $objetivo->delete();

        return redirect()->route('objetivos.index')
            ->with('success', 'Objetivo estratégico eliminado correctamente');
    }
}
