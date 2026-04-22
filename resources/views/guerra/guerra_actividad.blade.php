<div class="card text-bg-dark mt-3">
    <div class="card-header">
        <h2 class="text-center text-info text-uppercase fw-bold">Actividad</h2>
    </div>
    <div class="card-body">
        @if($guerra->estado!="Finalizada")

        @php
            $vivos = $jugadores->where('vivo', true)->count();
            $muertos = $jugadores->where('vivo', false)->count();
            $eventos = $actividades->where('tipo', '!=', 'asesinato')->count();
        @endphp
        <div class="text-center d-flex justify-content-center">

            <form method="POST" action="{{ url("/actividad/evento-aleatorio/{$guerra->id}") }}">
                @csrf
                <button type="submit" class="btn" style="background-color: #9561fb;" {{ ($vivos < 2 || $muertos < 1 || $eventos >= $guerra->max_eventos) ? 'disabled': '' }}>
                    <i class="bi bi-stars"></i>
                </button>
            </form>
        
            <form method="POST" action="{{config('app.url')}}/actividad/nueva/{{$guerra->id}}">
                @csrf
                <button type="submit" class="btn btn-info text-light mx-2 mb-2"><i class="bi bi-play-fill"></i>Nuevo asesinato</button>
            </form>
        </div>

        @endif
        
        <ol class="list-group">
        @forelse($actividades as $actividad)
            @php
                $config = [
                    'asesinato' => [
                        'emoji' => '🩸',
                        'texto' => "<strong>{$actividad->asesino}</strong> ha matado a <strong>{$actividad->muerto}</strong>"
                    ],
                    'cambio' => [
                        'emoji' => '🔄',
                        'texto' => "<strong>{$actividad->asesino}</strong> y <strong>{$actividad->muerto}</strong> intercambiaron equipos"
                    ],
                    'resucitar' => [
                        'emoji' => '🙏',
                        'texto' => "<strong>{$actividad->muerto}</strong> ha resucitado!"
                    ]
                ][$actividad->tipo] ?? [
                    'emoji' => '📍',
                    'texto' => "Evento: {$actividad->asesino} -> {$actividad->muerto}"
                ];
            @endphp

            <li class="list-group-item bg-transparent d-flex text-light justify-content-between align-items-start border-0 border-start border-4 mb-1">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <p class="mb-0">{!! $config['texto'] !!}</p>
                    <div class="text-end d-flex align-items-center gap-2">
                        <small class="text-secondary">{{ $actividad->created_at->locale('es_ES')->diffForHumans(['parts' => 1, 'short' => true]) }}</small>
                        <span class="fs-5">{{ $config['emoji'] }}</span>
                    </div>
                </div>
            </li>
            @empty
                <div class="alert alert-info mb-0" role="alert">
                    <i class="bi bi-info-circle-fill"></i> No hay actividad todavía.
                </div>
            @endforelse
        </ol>
    </div>
</div>
