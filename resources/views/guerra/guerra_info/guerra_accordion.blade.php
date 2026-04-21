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
                            <button class="btn btn-link text-danger p-0" type="submit"><i class="bi bi-trash"></i></button>
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

                @if($guerra->estado == "Creado" && $equipo->jugadores->count() < $guerra->jugadores_equipo)
                    <div class="px-2 pb-2">
                        <form method="GET" action="{{ url('/jugador/nuevo') }}">
                            <input type="hidden" name="idEquipo" value="{{ $equipo->id }}" />
                            <button type="submit" class="btn btn-sm btn-outline-info w-100"><i class="bi bi-plus-circle-fill"></i> Jugador</button>
                        </form>
                    </div>
                    @endif
                    
                    @if ($guerra->estado == "Creado")
                    <div class="px-2 pb-2">
                        <a class="btn btn-sm btn-outline-info w-100" href="{{ url("/equipo/{$equipo->id}/update") }}"><i class="bi bi-pencil"></i> Editar</a>
                    </div>
                    <div class="px-2 pb-2">
                        <form method="POST" action="{{ url("/equipo/{$equipo->id}/delete") }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100" type="submit"><i class="bi bi-trash"></i> Eliminar</button>
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