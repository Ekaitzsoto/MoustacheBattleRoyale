<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Jugador;
use \App\Models\Actividad;
use \App\Models\Guerra;

class ActividadController extends Controller
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
    public function create($id)
    {
        $jugadoresActividad = Jugador::where('vivo', 1)->where('guerra_id', $id)->inRandomOrder()->limit(2)->get();
        Actividad::create([
            'guerra_id' => $id,
            'asesino' => $jugadoresActividad[0]->nombre,
            'muerto' => $jugadoresActividad[1]->nombre,
            'tipo' => 'asesinato'
        ]);

        $muerto = Jugador::find($jugadoresActividad[1]->id);
        $muerto->vivo = 0;
        $muerto->save();

        $asesino = Jugador::find($jugadoresActividad[0]->id);
        $asesino->kills = $asesino->kills+1;
        $asesino->save();
        return redirect('/guerra');
    }

    public function eventoAleatorio($id)
    {
        $guerra = Guerra::findOrFail($id);
        $vivosCount = Jugador::where('guerra_id', $id)->where('vivo', 1)->count();
        $muertosCount = Jugador::where('guerra_id', $id)->where('vivo', 0)->count();

        $eventosCount = Actividad::where('guerra_id', $id)->where('tipo', '!=', 'asesinato')->count();
        
        if (($vivosCount < 2 || $muertosCount < 1) && $guerra->estado !== 'En curso' && $eventosCount < $guerra->max_eventos) {
            return redirect()->back()->with('error', "No se cumplen las condiciones para lanzar un evento en este momento.");
        }
        $evento = rand(1, 2);

        if ($evento === 1) {
            return $this->generarCambioEquipo($guerra);
        } else {
            return $this->generarResurreccion($guerra);
        }
    }

    private function generarCambioEquipo($guerra)
    {
        $jugadores = Jugador::where('guerra_id', $guerra->id)->where('vivo', 1)->inRandomOrder()->limit(2)->get();

        if ($jugadores->count() < 2) {
            return $this->generarResurreccion($guerra);
        }

        $j1 = $jugadores[0];
        $j2 = $jugadores[1];

        $oldEq1 = $j1->equipo_id;
        $j1->update(['equipo_id' => $j2->equipo_id]);
        $j2->update(['equipo_id' => $oldEq1]);

        Actividad::create([
            'guerra_id' => $guerra->id,
            'asesino' => $j1->nombre,
            'muerto' => $j2->nombre,
            'tipo' => 'cambio'
        ]);
        return redirect()->back()->with('success', "Evento aleatorio generado");
    }

    private function generarResurreccion($guerra)
    {
        $muerto = Jugador::where('guerra_id', $guerra->id)->where('vivo', 0)->inRandomOrder()->first();

        if (!$muerto) {
            return $this->generarCambioEquipo($guerra);
        }

        $muerto->update(['vivo' => true, 'asesinadopor' => null]);

        Actividad::create([
            'guerra_id' => $guerra->id,
            'asesino' => null,
            'muerto' => $muerto->nombre,
            'tipo' => 'resucitar'
        ]);

        return redirect()->back()->with('success', "Evento aleatorio generado");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
