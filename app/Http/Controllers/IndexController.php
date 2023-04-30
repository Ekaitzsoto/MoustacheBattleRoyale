<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $guerra = $request->get('bus');
        $equipos =\App\Models\Equipo::where('guerra', 'like' , "%$guerra%")->get();
        return view("guerra", ['lstEquipos'=> $equipos]);
    }
}
