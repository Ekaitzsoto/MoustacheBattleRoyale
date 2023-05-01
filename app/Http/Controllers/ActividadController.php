<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Jugador;
use \App\Models\Asesinato;

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
        $jugadoresActividad = Jugador::where('vivo', 1)->inRandomOrder()->limit(2)->get();
        Asesinato::create([
            'guerra_id' => $id,
            'asesino' => $jugadoresActividad[0]->nombre,
            'muerto' => $jugadoresActividad[1]->nombre
        ]);

        $muerto = Jugador::find($jugadoresActividad[1]->id);
        $muerto->vivo = 0;
        $muerto->save();

        $asesino = Jugador::find($jugadoresActividad[0]->id);
        $asesino->kills = $asesino->kills+1;
        $asesino->save();
        return redirect('/');
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
