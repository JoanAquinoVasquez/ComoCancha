<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalisisInterno;

class AnalisisInternoController extends Controller
{
    public function index()
    {
        $analisisInternos = AnalisisInterno::all();
        return view('analisis_internos.index', compact('analisisInternos'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo análisis interno
        return view('analisis_internos.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda el nuevo análisis interno
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Fortalezas' => 'required|string',
            'Debilidades' => 'required|string',
        ]);

        $analisisInterno = AnalisisInterno::create($request->all());

        return redirect()->route('analisis_internos.show', $analisisInterno->IdAnalisisInterno)
            ->with('success', 'Análisis interno creado correctamente');
    }

    public function show($id)
    {
        $analisisInterno = AnalisisInterno::findOrFail($id);
        return view('analisis_internos.show', compact('analisisInterno'));
    }

    public function edit($id)
    {
        $analisisInterno = AnalisisInterno::findOrFail($id);
        return view('analisis_internos.edit', compact('analisisInterno'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza el análisis interno
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Fortalezas' => 'required|string',
            'Debilidades' => 'required|string',
        ]);

        $analisisInterno = AnalisisInterno::findOrFail($id);
        $analisisInterno->update($request->all());

        return redirect()->route('analisis_internos.show', $analisisInterno->IdAnalisisInterno)
            ->with('success', 'Análisis interno actualizado correctamente');
    }

    public function destroy($id)
    {
        $analisisInterno = AnalisisInterno::findOrFail($id);
        $analisisInterno->delete();

        return redirect()->route('analisis_internos.index')
            ->with('success', 'Análisis interno eliminado correctamente');
    }
}
