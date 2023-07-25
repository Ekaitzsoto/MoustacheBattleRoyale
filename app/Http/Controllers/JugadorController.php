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
        return view('nuevo_jugador', ['idEquipo'=>$request->idEquipo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:30',
        ]);

        $guerra = Guerra::orderBy('created_at', 'desc')->first();
        Jugador::create([
            'nombre' => $request->get('nombre'),
            'kills' => 0,
            'vivo' => true,
            'equipo_id' => $request->idEquipo,
            'guerra_id' => $guerra->id
        ]);
        return redirect('/');
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
        \App\Models\Jugador::destroy($id);

        return redirect('/');
    }
}
