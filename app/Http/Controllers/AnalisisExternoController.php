<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalisisExterno;

class AnalisisExternoController extends Controller
{
    public function index()
    {
        $analisisExternos = AnalisisExterno::all();
        return view('analisis_externos.index', compact('analisisExternos'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo análisis externo
        return view('analisis_externos.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda el nuevo análisis externo
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Oportunidades' => 'required|string',
            'Amenazas' => 'required|string',
        ]);

        $analisisExterno = AnalisisExterno::create($request->all());

        return redirect()->route('analisis_externos.show', $analisisExterno->IdAnalisisExterno)
            ->with('success', 'Análisis externo creado correctamente');
    }

    public function show($id)
    {
        $analisisExterno = AnalisisExterno::findOrFail($id);
        return view('analisis_externos.show', compact('analisisExterno'));
    }

    public function edit($id)
    {
        $analisisExterno = AnalisisExterno::findOrFail($id);
        return view('analisis_externos.edit', compact('analisisExterno'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza el análisis externo
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Oportunidades' => 'required|string',
            'Amenazas' => 'required|string',
        ]);

        $analisisExterno = AnalisisExterno::findOrFail($id);
        $analisisExterno->update($request->all());

        return redirect()->route('analisis_externos.show', $analisisExterno->IdAnalisisExterno)
            ->with('success', 'Análisis externo actualizado correctamente');
    }

    public function destroy($id)
    {
        $analisisExterno = AnalisisExterno::findOrFail($id);
        $analisisExterno->delete();

        return redirect()->route('analisis_externos.index')
            ->with('success', 'Análisis externo eliminado correctamente');
    }
}
