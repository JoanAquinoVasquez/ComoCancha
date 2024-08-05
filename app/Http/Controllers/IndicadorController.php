<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicador;

class IndicadorController extends Controller
{
    public function edit($id)
    {
        $indicador = Indicador::findOrFail($id);
        return view('indicadores.edit', compact('indicador'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza el indicador
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'Descripcion' => 'required|string',
            'ValorMeta' => 'required|numeric',
            'ValorActual' => 'nullable|numeric',
            'FechaMedicion' => 'required|date',
        ]);

        $indicador = Indicador::findOrFail($id);
        $indicador->update($request->all());

        return redirect()->route('indicadores.show', $indicador->IdIndicador)
            ->with('success', 'Indicador actualizado correctamente');
    }

    public function destroy($id)
    {
        $indicador = Indicador::findOrFail($id);
        $indicador->delete();

        return redirect()->route('indicadores.index')
            ->with('success', 'Indicador eliminado correctamente');
    }
}
