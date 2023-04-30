<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuerraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guerra = \App\Models\Guerra::orderBy('created_at', 'desc')->first();
        return view("guerra", ['guerra' => $guerra]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view("nueva_guerra");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\Guerra::create([
            'nombre' => $request->get('nombre'),
            'edicion' => $request->get('edicion'),
            'estado' => "creado"
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guerraSeleccionada = \App\Models\Guerra::where('id', 'like' , "%$id%")->get();
        $equiposGuerra =\App\Models\Equipo::where('guerra_id', 'like' , "%$id%")->get();
        return view('guerra', ['guerra'=> $guerraSeleccionada], ['equipos'=> $equiposGuerra]);
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
        \App\Models\Guerra::destroy($id);

        return redirect('/');
    }
}
