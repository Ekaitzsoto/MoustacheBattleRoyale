<link rel="stylesheet" href="{{ asset('css/guerra_accordion.css') }}">

<div class="accordion" id="accordionEquipos">
    @forelse ($equipos as $equipo)
    @php
        $estaEliminado = $equipo->jugadores->where('vivo', true)->isEmpty();
    @endphp

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
                            @method('DELETE')
                            <button class="btn btn-link text-danger p-0" type="submit"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        @else
                        <span class="badge {{ $jugador->vivo ? 'bg-info' : 'bg-danger' }} rounded-pill">{{ $jugador->kills }}</span>
                        @endif
                    </li>
                    @empty
                    <div class="alert alert-info m-2">
                        <i class="bi bi-info-circle-fill me-2"></i> No hay jugadores todavía.
                    </div>
                    @endforelse
                </ol>

                @if($guerra->estado == "Creado")
                <div class="px-2 pb-2">
                    <div class="row g-2 justify-content-end">

                        @if($equipo->jugadores->count() < $guerra->jugadores_equipo)
                        <div class="col-12 col-sm-3 col-md-2 col-lg-1">
                            <form method="GET" action="{{ url('/jugador/nuevo') }}">
                                <input type="hidden" name="idEquipo" value="{{ $equipo->id }}" />
                                <button type="submit" class="btn btn-sm btn-outline-info w-100 h-100">
                                    <i class="bi bi-plus-circle-fill"></i> Jugador
                                </button>
                            </form>
                        </div>
                        @endif

                        <div class="col-12 col-sm-3 col-md-2 col-lg-1">
                            <a class="btn btn-sm btn-outline-info w-100 h-100 d-flex align-items-center justify-content-center" 
                            href="{{ url("/equipo/{$equipo->id}/update") }}">
                                <i class="bi bi-pencil-fill me-1"></i> Editar
                            </a>
                        </div>

                        <div class="col-12 col-sm-3 col-md-2 col-lg-1">
                            <form method="POST" action="{{ url("/equipo/{$equipo->id}/delete") }}" class="h-100">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger w-100 h-100" type="submit">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </button>
                            </form>
                        </div>

                    </div>
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