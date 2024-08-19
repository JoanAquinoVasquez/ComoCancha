<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galerias = Galeria::all();
        return response()->json($galerias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cancha_id' => 'required|exists:cancha,id',
        ]);

        $imagePath = $request->file('image')->store('galeria', 'public');

        $galeria = Galeria::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'image_path' => $imagePath,
            'cancha_id' => $request->cancha_id,
        ]);

        return response()->json($galeria, 201);
    }

    public function show(Galeria $galeria)
    {
        return response()->json($galeria);
    }

    public function update(Request $request, Galeria $galeria)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cancha_id' => 'required|exists:cancha,id',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($galeria->image_path);
            $imagePath = $request->file('image')->store('galeria', 'public');
        } else {
            $imagePath = $galeria->image_path;
        }

        $galeria->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'image_path' => $imagePath,
            'cancha_id' => $request->cancha_id,
        ]);

        return response()->json($galeria);
    }

    public function destroy(Galeria $galeria)
    {
        Storage::disk('public')->delete($galeria->image_path);
        $galeria->delete();

        return response()->json(null, 204);
    }
}
