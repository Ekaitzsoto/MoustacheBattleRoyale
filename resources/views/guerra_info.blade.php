@if($guerra)
<div class="card text-center mt-3">
    <div class="card-header">
        <h1 class="text-center text-info-emphasis fw-bold">{{$guerra->nombre}}</h1>
        @if($guerra->estado == "Creado")
            <h4><span class="badge bg-info">{{$guerra->estado}}</span></h4>
            @elseif($guerra->estado == "En curso")
            <h4><span class="badge bg-warning">{{$guerra->estado}}</span></h4>
        @elseif($guerra->estado == "Finalizada")
            <h4><span class="badge bg-danger">{{$guerra->estado}}</span></h4>
        @endif

        @if ($guerra->estado == "Finalizada")
        <div class="row justify-content-center">
            <div  class="col-5 text-center">
                <a class="btn btn-info text-light" href="{{config('app.url')}}/guerra/nueva">Nueva Guerra</a>
            </div>
        </div>
        @endif

    </div>
    <div class="card-body">
        <div class="row justify-content-end">
            <div class="col-sm-12 d-flex justify-content-center justify-content-md-end">
                @if($guerra->estado == "Creado")
                @if(count($jugadores)>=2)
                    <form method="POST" action="{{config('app.url')}}/guerra/{{$guerra->id}}/estado">
                        @csrf
                        <button type="submit" class="btn btn-info text-light mx-2"><i class="bi bi-play-fill"></i> Empezar Guerra</button>
                    </form>
                @endif
                <a class="btn btn-info text-light" href="{{config('app.url')}}/equipo/nuevo"><i class="bi bi-plus-circle-fill"></i> Nuevo Equipo</a>
                @else
                    @if (count($jugadoresvivos)==1)
                        <h4 class="col-12 mx-2 justify-content-md-center">Ganador: <strong>{{$jugadoresvivos[0]->nombre}} !!</strong></h4>
                    @else
                        <h4 class="mx-2">Jugadores restantes: {{count($jugadoresvivos)}}</h4>
                    @endif
                @endif
            </div>
        </div>
        <hr>
        <div class="accordion" id="accordionEquipos">
        <!-- EQUIPOS -->
            @forelse ($equipos as $equipo)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed {{ $equipo->jugadores->where('vivo', true)->isEmpty() ? 'bg-danger-subtle' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$equipo->id}}" aria-expanded="true" aria-controls="collapse{{$equipo->id}}">
                        <span class=" {{ $equipo->jugadores->where('vivo', true)->isEmpty() ? 'text-danger' : '' }}">{{$equipo->nombre}}<span> ({{$equipo->presidente}})</span></span>
                        </button>
                    </h2>
                    <div id="collapse{{$equipo->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionEquipos">
                        <div class="accordion-body">
                            <ol class="list-group list-group-numbered">
                                <!-- JUGADORES -->
                                @forelse($equipo->jugadores()->get() as $jugador)
                                @if ($jugador->vivo)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{$jugador->nombre}}</div>
                                        </div>
                                        @if ($guerra->estado == "Creado")
                                            <form method="POST" action="{{config('app.url')}}/jugador/{{$jugador->id}}/delete">
                                                @csrf
                                                <span>
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="bi bi-trash text-light"></i>
                                                    </button>
                                                </span>
                                            </form>
                                        @endif
                                        @if ($guerra->estado != "Creado")
                                            <span class="badge bg-info rounded-pill">Kills: {{$jugador->kills}}</span>
                                        @endif
                                    </li>
                                @else
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="text-decoration-line-through">{{$jugador->nombre}}</div><span></span>
                                        </div>
                                        <span class="badge bg-danger rounded-pill">Kills: {{$jugador->kills}}</span>
                                    </li>
                                @endif
                                @empty
                                <div class="alert alert-info d-flex align-items-center" role="alert">
                                    <i class="bi bi-info-circle-fill me-2"></i>
                                    <div>El equipo no tiene jugadores.</div>
                                </div>
                                @endforelse
                            </ol>
                            @if($guerra->estado == "Creado" && $equipo->jugadores()->count() < $guerra->jugadores_equipo)
                                <form method="GET" action="{{config('app.url')}}/jugador/nuevo">
                                    <input type="hidden" name="idEquipo" value="{{$equipo->id}}"/>
                                    <button type="submit" class="btn btn-info text-light mt-2"><i class="bi bi-plus-circle-fill"></i> Nuevo Jugador</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                <div>La guerra no tiene equipos todavía.</div>
            </div>
            @endforelse

        </div>
    </div>
</div>
@else
<div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 pt-3">
        <div class="alert alert-info d-flex align-items-center" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <div>No hay ninguna guerra creada todavía.</div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div  class="col-5 text-center">
        <a class="btn btn-info text-light" href="{{config('app.url')}}/guerra/nueva">Nueva Guerra</a>
    </div>
</div>
@endif
