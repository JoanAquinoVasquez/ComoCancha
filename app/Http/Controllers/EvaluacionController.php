<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluacion;

class EvaluacionController extends Controller
{
    public function index()
    {
        $evaluaciones = Evaluacion::all();
        return view('evaluaciones.index', compact('evaluaciones'));
    }

    public function create()
    {
        // Muestra el formulario para crear una nueva evaluación
        return view('evaluaciones.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda la nueva evaluación
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'FechaEvaluacion' => 'required|date',
            'Resultado' => 'nullable|string',
        ]);

        $evaluacion = Evaluacion::create($request->all());

        return redirect()->route('evaluaciones.show', $evaluacion->IdEvaluacion)
            ->with('success', 'Evaluación creada correctamente');
    }

    public function show($id)
    {
        $evaluacion = Evaluacion::findOrFail($id);
        return view('evaluaciones.show', compact('evaluacion'));
    }

    public function edit($id)
    {
        $evaluacion = Evaluacion::findOrFail($id);
        return view('evaluaciones.edit', compact('evaluacion'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza la evaluación
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'FechaEvaluacion' => 'required|date',
            'Resultado' => 'nullable|string',
        ]);

        $evaluacion = Evaluacion::findOrFail($id);
        $evaluacion->update($request->all());

        return redirect()->route('evaluaciones.show', $evaluacion->IdEvaluacion)
            ->with('success', 'Evaluación actualizada correctamente');
    }

    public function destroy($id)
    {
        $evaluacion = Evaluacion::findOrFail($id);
        $evaluacion->delete();

        return redirect()->route('evaluaciones.index')
            ->with('success', 'Evaluación eliminada correctamente');
    }
}
