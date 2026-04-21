<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Guerra;
use \App\Models\Equipo;
use \App\Models\Jugador;

class JugadorController extends Controller
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
    public function create(Request $request)
    {
        return view('forms/nuevo_jugador', ['idEquipo'=>$request->idEquipo]);
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
            return redirect()->back()->withErrors(['error' => 'No se pueden añadir jugadores: la guerra ya ha comenzado o ha finalizado.']);
        }

        //validar equipo
        $equipo = Equipo::find($request->idEquipo);
        if (!$equipo) {
            return redirect()->back()->withErrors(['error' => 'El equipo no existe.']);
        }
        if ($equipo->guerra_id !== $guerra->id) {
            return redirect()->back()->withErrors(['error' => 'El equipo no pertenece a la guerra actual.']);
        }
        if($equipo->jugadores()->count() >= $guerra->jugadores_equipo) {
            return redirect()->back()->withErrors(['error' => 'El equipo ya tiene el número máximo de jugadores permitido.']);
        }

        //validar jugador
        $validated = $request->validate([
            'nombre' => 'required|max:30',
        ]);

        Jugador::create([
            'nombre' => $request->get('nombre'),
            'kills' => 0,
            'vivo' => true,
            'equipo_id' => $request->idEquipo,
            'guerra_id' => $guerra->id
        ]);
        return redirect('/guerra');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jugador::destroy($id);
        return redirect('/guerra');
    }
}
