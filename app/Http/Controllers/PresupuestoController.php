<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuesto;

class PresupuestoController extends Controller
{
    public function index()
    {
        $presupuestos = Presupuesto::all();
        return view('presupuestos.index', compact('presupuestos'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo presupuesto
        return view('presupuestos.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda el nuevo presupuesto
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'MontoTotal' => 'required|numeric',
            'FechaAprobacion' => 'required|date',
            'Detalle' => 'nullable|string',
        ]);

        $presupuesto = Presupuesto::create($request->all());

        return redirect()->route('presupuestos.show', $presupuesto->IdPresupuesto)
            ->with('success', 'Presupuesto creado correctamente');
    }

    public function show($id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        return view('presupuestos.show', compact('presupuesto'));
    }

    public function edit($id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        return view('presupuestos.edit', compact('presupuesto'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza el presupuesto
        $request->validate([
            'IdPlan' => 'required|exists:plan_estrategico,IdPlan',
            'MontoTotal' => 'required|numeric',
            'FechaAprobacion' => 'required|date',
            'Detalle' => 'nullable|string',
        ]);

        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->update($request->all());

        return redirect()->route('presupuestos.show', $presupuesto->IdPresupuesto)
            ->with('success', 'Presupuesto actualizado correctamente');
    }

    public function destroy($id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->delete();

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto eliminado correctamente');
    }
}
