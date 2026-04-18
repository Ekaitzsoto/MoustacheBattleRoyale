<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Guerra;
use \App\Models\Equipo;
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nuevo_equipo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar guerra
        $guerra = Guerra::orderBy('created_at', 'desc')->first();
        if (!$guerra) {
            return redirect()->back()->withErrors(['error' => 'No hay ninguna guerra creada.']);
        }
        if ($guerra->estado !== 'Creado') {
            return redirect()->back()->withErrors(['error' => 'No se pueden añadir equipos: la guerra ya ha comenzado o ha finalizado.']);
        }
        //validar equipo
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'presidente' => 'required|max:30',
        ]);
        
        Equipo::create([
            'nombre' => $validated['nombre'],
            'presidente' => $validated['presidente'],
            'guerra_id' => $guerra->id
        ]);
        return redirect('/guerra')->with('success', 'Equipo creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('nuevo_equipo', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validar guerra
        $guerra = Guerra::orderBy('created_at', 'desc')->first();

        if (!$guerra) {
            return redirect()->back()->withErrors(['error' => 'No hay ninguna guerra creada.']);
        }
        if ($guerra->estado !== 'Creado') {
            return redirect()->back()->withErrors(['error' => 'No se puede editar el equipo: la guerra ya ha comenzado o ha finalizado.']);
        }
        
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'presidente' => 'required|max:30',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->update($validated);

        return redirect('/guerra')->with('success', 'Equipo actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //validar guerra
        $guerra = Guerra::orderBy('created_at', 'desc')->first();
        if (!$guerra) {
            return redirect()->back()->withErrors(['error' => 'No hay ninguna guerra creada.']);
        }
        if ($guerra->estado !== 'Creado') {
            return redirect()->back()->withErrors(['error' => 'No se puede eliminar el equipo: la guerra ya ha comenzado o ha finalizado.']);
        }
        $equipo = Equipo::findOrFail($id);
        if ($guerra->id !== $equipo->guerra_id) {
            return redirect()->back()->withErrors(['error' => 'No se puede eliminar el equipo: no pertenece a la guerra actual.']);
        }
        
        $equipo->jugadores()->delete();
        $equipo->delete();

        return redirect('/guerra')->with('success', 'Equipo eliminado.');
    }
}
