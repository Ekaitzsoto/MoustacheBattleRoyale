<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Guerra;
use \App\Models\Equipo;
use \App\Models\Jugador;
use \App\Models\Asesinato;

class GuerraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guerra = Guerra::orderBy('created_at', 'desc')->first();
        if($guerra !=null){
            $equipos = Equipo::where('guerra_id', 'like' , "%$guerra->id%")->get();
            $asesinatos = Asesinato::where('guerra_id','like', "%$guerra->id%")->orderBy('created_at', 'desc')->get();
            $jugadores = $guerra->jugadores()->get();
            $jugadoresvivos = $guerra->jugadores()->where('vivo', 1)->get();
            if(!empty($jugadores)){
                if(count($jugadoresvivos)==1 && $guerra->estado == "En curso"){
                    $guerra->estado = "Finalizada";
                    $guerra->ganador = $jugadoresvivos[0]->nombre;
                    $guerra->save();
                }
                return view("guerra", ['guerra' => $guerra, 'equipos' => $equipos,'jugadores' => $jugadores, 'jugadoresvivos' => $jugadoresvivos, 'asesinatos'=>$asesinatos]);
            }
            return view("guerra", ['guerra' => $guerra,'equipos' => $equipos, 'asesinatos'=>$asesinatos]);
        }
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
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'jugadores_equipo' => 'required',
        ]);

        Guerra::create([
            'nombre' => $request->get('nombre'),
            'jugadores_equipo' => $request->get('jugadores_equipo'),
            'estado' => "Creado"
        ]);
        return redirect('/guerra')->with('success', 'Guerra creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $guerras = Guerra::orderBy('created_at', 'desc')->get();
        return view("historial", ['guerras' => $guerras]);
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
        $guerra = Guerra::find($id);

        $guerra->estado = "En curso";
        $guerra->save();

        return redirect('/guerra')->with('success', 'Y ¡PUM! YA ESTÁ AQUÍ LA GUERRA.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guerra::destroy($id);
        return redirect('/guerra')->with('success', 'Guerra eliminada.');
    }

    public function reiniciar(string $id)
    {
        $guerra = Guerra::orderBy('created_at', 'desc')->first();

        if (!$guerra || $guerra->id != $id) {
            return redirect('/guerra')->with('error', 'Solo se puede reiniciar la guerra actual');
        }
        $guerra->update(['estado' => 'Creado','ganador' => null]);

        Jugador::where('guerra_id', $id)->update(['kills' => 0, 'vivo' => true, 'asesinadopor' => null]);
        Asesinato::where('guerra_id', $id)->delete();

        return redirect('/guerra')->with('success', 'Guerra reiniciada.');
    }
}
