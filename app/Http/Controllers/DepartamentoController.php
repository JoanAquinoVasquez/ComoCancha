<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return response()->json($departamentos);
    }

    public function show($id)
    {
        $departamento = Departamento::find($id);
        return response()->json($departamento);
    }

    public function store(Request $request)
    {
        $departamento = Departamento::create($request->all());
        return response()->json($departamento, 201);
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->update($request->all());
        return response()->json($departamento);
    }

    public function destroy($id)
    {
        Departamento::destroy($id);
        return response()->json(null, 204);
    }
}