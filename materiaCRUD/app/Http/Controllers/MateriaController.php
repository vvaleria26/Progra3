<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'creditos' => 'required|integer',
            'tipo' => 'required',
            'valor_hora' => 'required|numeric',
            'estado' => 'required',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')
                         ->with('success', 'Materia creada exitosamente.');
    }

    public function show(Materia $materia)
    {
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'creditos' => 'required|integer',
            'tipo' => 'required',
            'valor_hora' => 'required|numeric',
            'estado' => 'required',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')
                         ->with('success', 'Materia actualizada exitosamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('materias.index')
                         ->with('success', 'Materia eliminada exitosamente.');
    }
}
