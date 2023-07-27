<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Guerra;
use \App\Models\Equipo;

class IndexController extends Controller
{
    public function index()
    {
        return view("endesarrollo");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $guerra = Guerra::latest()->first();
        if($guerra != null && $guerra->jugadores->count() > 0){
            $restantes = $guerra->jugadores()->where('vivo', 1)->get();
            $porcientoVivos = ($restantes->count() / $guerra->jugadores()->count())*100;
            $totalMuertos = $guerra->jugadores()->count()-$restantes->count();
            $porcientoMuertos = ($totalMuertos / $guerra->jugadores()->count())*100;

            $topAsesinos = $guerra->jugadores()->orderByDesc('kills')->take(5)->get();

            $equiposConMasKills = Equipo::where('guerra_id', $guerra->id)->withSum('jugadores', 'kills')->orderByDesc('jugadores_sum_kills')->take(5)->get();

            return view("estadisticas.estadisticas", ['guerra' => $guerra, 'restantes' => $restantes, 'porcientoMuertos' => $porcientoMuertos, 'porcientoVivos' => $porcientoVivos, 'topAsesinos' => $topAsesinos, 'equiposConMasKills' => $equiposConMasKills]);
        }
        return view("sindatos");
    }
}
