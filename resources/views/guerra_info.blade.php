@if($guerra)

<link rel="stylesheet" href="{{ asset('css/guerra_info.css') }}">

<div class="card text-bg-dark text-center mt-3">
    <div class="card-header">
        <h1 class="text-info fw-bold">{{ $guerra->nombre }}</h1>
        
        @php
            $badgeColor = [
                'Creado' => 'bg-info',
                'En curso' => 'bg-warning',
                'Finalizada' => 'bg-danger'
            ][$guerra->estado] ?? 'bg-secondary';
        @endphp
        
        <h4><span class="badge {{ $badgeColor }}">{{ $guerra->estado }}</span></h4>

        @if ($guerra->estado == "Finalizada")
            <div class="mt-2">
                <a class="btn btn-info text-light" href="{{ url('/guerra/nueva') }}">Nueva Guerra</a>
            </div>
        @endif
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-center justify-content-md-end gap-2 mb-3">
            @if($guerra->estado == "Creado")
                @if(count($jugadores) >= 2)
                    <form method="POST" action="{{ url("/guerra/{$guerra->id}/estado") }}">
                        @csrf
                        <button type="submit" class="btn btn-info text-light"><i class="bi bi-play-fill"></i> Empezar</button>
                    </form>
                @endif
                <a class="btn btn-info text-light" href="{{ url('/equipo/nuevo') }}"><i class="bi bi-plus-circle-fill"></i> Equipo</a>
            @else
                @if (count($jugadoresvivos) == 1)
                    <h4 class="w-100">🏆 Ganador: <strong>{{ $jugadoresvivos[0]->nombre }}</strong></h4>
                @else
                    <h4>Vivos: {{ count($jugadoresvivos) }}</h4>
                @endif
            @endif
        </div>

        <hr class="opacity-10">

        <div class="accordion" id="accordionEquipos">
            @forelse ($equipos as $equipo)
                @php $estaEliminado = $equipo->jugadores->where('vivo', true)->isEmpty(); @endphp
                
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed {{ $estaEliminado ? 'opacity-50' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$equipo->id}}">
                            <span class="{{ $estaEliminado ? 'text-danger' : '' }}">
                                {{ $equipo->nombre }} <small class="opacity-75">({{ $equipo->presidente }})</small>
                            </span>
                        </button>
                    </h2>
                    
                    <div id="collapse{{$equipo->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionEquipos">
                        <div class="accordion-body p-0">
                            <ol class="list-group list-group-numbered list-group-flush">
                                @forelse($equipo->jugadores as $jugador)
                                    <li class="list-group-item bg-transparent text-light d-flex justify-content-between align-items-center">
                                        <div class="ms-2 me-auto {{ !$jugador->vivo ? 'text-decoration-line-through opacity-50' : '' }}">
                                            <span class="fw-bold">{{ $jugador->nombre }}</span>
                                        </div>

                                        @if ($guerra->estado == "Creado")
                                            <form method="POST" action="{{ url("/jugador/{$jugador->id}/delete") }}">
                                                @csrf
                                                <button class="btn btn-link text-danger p-0" type="submit"><i class="bi bi-trash"></i></button>
                                            </form>
                                        @else
                                            <span class="badge {{ $jugador->vivo ? 'bg-info' : 'bg-danger' }} rounded-pill">{{ $jugador->kills }}</span>
                                        @endif
                                    </li>
                                @empty
                                    <div class="alert alert-info m-2">
                                        <i class="bi bi-info-circle-fill me-2"></i> No hay equipos todavía.
                                    </div>
                                @endforelse
                            </ol>
                            
                            @if($guerra->estado == "Creado" && $equipo->jugadores->count() < $guerra->jugadores_equipo)
                                <div class="px-2 pb-2">
                                    <form method="GET" action="{{ url('/jugador/nuevo') }}">
                                        <input type="hidden" name="idEquipo" value="{{ $equipo->id }}"/>
                                        <button type="submit" class="btn btn-sm btn-outline-info w-100"><i class="bi bi-plus-circle-fill"></i> Jugador</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <i class="bi bi-info-circle-fill me-2"></i> No hay equipos todavía.
                </div>
            @endforelse
        </div>
    </div>
</div>
@else
    <div class="text-center mt-5">
        <div class="alert alert-info d-inline-block px-5">
            <i class="bi bi-info-circle-fill me-2"></i> No hay ninguna guerra creada.
        </div>
        <div class="mt-3">
            <a class="btn btn-info text-light" href="{{ url('/guerra/nueva') }}">Crear Nueva Guerra</a>
        </div>
    </div>
@endif