@extends("layouts.base")

@section("contenido")

@if($guerra)
<div class="card text-center mt-3">
    <div class="card-header">
        <h1 class="text-center text-info-emphasis fw-bold">{{$guerra->nombre}}
            @if($guerra->estado == "Creado")
                <span class="badge bg-info">{{$guerra->estado}}</span>
            @elseif($guerra->estado == "En curso")
                <span class="badge bg-warning">{{$guerra->estado}}</span>
            @elseif($guerra->estado == "Finalizado")
                <span class="badge bg-danger">{{$guerra->estado}}</span>
            @endif
        </h1>
    </div>
    <div class="card-body">
        <div class="row justify-content-end">
            <div class="col-sm-12 d-flex justify-content-center justify-content-md-end">
                @if($guerra->estado == "Creado")
                    @if(count($equipos)>0)
                        <form method="POST" action="{{config('app.url')}}/guerra/{{$guerra->id}}/estado">
                            @csrf
                            <button type="submit" class="btn btn-info text-light mx-2"><i class="bi bi-play-fill"></i> Empezar Guerra</button>
                        </form>
                    @endif
                <a class="btn btn-info text-light" href="{{config('app.url')}}/equipo/nuevo"><i class="bi bi-plus-circle-fill"></i> Nuevo Equipo</a>
                @else
                <h4 class="mx-2">Jugadores restantes: XX</h4>
                @endif
            </div>
        </div>
        <hr>
        <div class="accordion" id="accordionEquipos">
        <!-- EQUIPOS -->
            @forelse ($equipos as $equipo)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$equipo->id}}" aria-expanded="true" aria-controls="collapse{{$equipo->id}}">
                        {{$equipo->nombre}}
                        </button>
                    </h2>
                    <div id="collapse{{$equipo->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionEquipos">
                        <div class="accordion-body">
                            <ul>
                                <!-- JUGADORES -->
                                @forelse($equipo->jugadores()->get() as $jugador)
                                <li>{{$jugador->nombre}}</li>
                                @empty
                                <p>El equipo no tiene jugadores todavía.</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                <p>La guerra no tiene equipos todavía.</p>
            @endforelse

        </div>
    </div>
</div>
@else
<div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 pt-3">
        <div class="alert alert-info" role="alert">
            <p class="text-center"><span><i class="bi bi-info-circle-fill"></i> </span>No hay ninguna guerra creada todavía.</p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div  class="col-5 text-center">
        <a class="btn btn-info text-light" href="{{config('app.url')}}/guerra/nueva">Nueva Guerra</a>
    </div>
</div>
@endif

@endsection
