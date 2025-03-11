<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return response()->json($pagos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'metodo' => 'nullable|string|max:255',
            'estado' => 'required|boolean',
            'reserva_id' => 'required|exists:reserva,id',
        ]);

        $pago = Pago::create($validatedData);
        return response()->json($pago, 201);
    }
    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return response()->json($pago);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'monto' => 'sometimes|required|numeric',
            'fecha' => 'sometimes|required|date',
            'metodo' => 'sometimes|nullable|string|max:255',
            'estado' => 'sometimes|required|boolean',
            'reserva_id' => 'sometimes|required|exists:reserva,id',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($validatedData);
        return response()->json($pago);
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return response()->json(null, 204);
    }
}