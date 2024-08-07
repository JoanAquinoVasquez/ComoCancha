<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanEstrategico;

class PlanEstrategicoController extends Controller
{
    public function index()
    {
        $planes = PlanEstrategico::all();
        return view('planes.index', compact('planes'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo plan estratégico
        return view('planes.create');
    }

    public function store(Request $request)
    {
        // Valida y guarda el nuevo plan estratégico
        $request->validate([
            'Vision' => 'required|string',
            'Mision' => 'required|string',
            'Valores' => 'required|string',
            'FechaCreacion' => 'required|date',
            'Archivo' => 'nullable|file',
        ]);

        $plan = PlanEstrategico::create($request->all());

        return redirect()->route('planes.show', $plan->IdPlan)
            ->with('success', 'Plan estratégico creado correctamente');
    }

    public function show($id)
    {
        $plan = PlanEstrategico::findOrFail($id);
        return view('planes.show', compact('plan'));
    }

    public function edit($id)
    {
        $plan = PlanEstrategico::findOrFail($id);
        return view('planes.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza el plan estratégico
        $request->validate([
            'Vision' => 'required|string',
            'Mision' => 'required|string',
            'Valores' => 'required|string',
            'FechaCreacion' => 'required|date',
            'Archivo' => 'nullable|file',
        ]);

        $plan = PlanEstrategico::findOrFail($id);
        $plan->update($request->all());

        return redirect()->route('planes.show', $plan->IdPlan)
            ->with('success', 'Plan estratégico actualizado correctamente');
    }

    public function destroy($id)
    {
        $plan = PlanEstrategico::findOrFail($id);
        $plan->delete();

        return redirect()->route('planes.index')
            ->with('success', 'Plan estratégico eliminado correctamente');
    }
}
