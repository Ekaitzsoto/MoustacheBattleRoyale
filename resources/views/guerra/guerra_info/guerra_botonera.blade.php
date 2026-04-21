@if ($guerra->estado == "En curso")
<form method="POST" action="{{ url("/guerra/{$guerra->id}/reiniciar") }}">
    @csrf
    <button type="submit" class="btn btn-info mb-3 text-light"><i class="bi bi-arrow-clockwise"></i> Reiniciar</button>
</form>
@endif
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