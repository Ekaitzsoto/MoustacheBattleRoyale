<div class="card mt-3 mb-5">
    <div class="card-header">
        <h1 class="text-center text-info-emphasis fw-bold">Asesinatos</h1>
    </div>
    <div class="card-body">
        @if($guerra->estado!="Finalizada")

        <form method="POST" action="{{config('app.url')}}/actividad/nueva/{{$guerra->id}}" class="text-center">
            @csrf
            <button type="submit" class="btn btn-info text-light mx-2 mb-2"><i class="bi bi-play-fill"></i>Nuevo asesinato</button>
        </form>

        @endif
        <ol class="list-group">
            @forelse($asesinatos as $asesinato)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1"><strong>{{$asesinato->asesino}}</strong> ha matado a <strong>{{$asesinato->muerto}}</strong></p>
                    <small>{{$asesinato->created_at->locale('es_ES')->diffForHumans(['parts' => 3, 'short'=>true]);}}</small>
                </div>
            </li>
            @empty
            <div class="alert alert-info" role="alert">
                <p class="text-center"><span><i class="bi bi-info-circle-fill"></i> </span>No ha habido ningún asesinato todavía</p>
            </div>
            @endforelse
        </ol>
    </div>
</div>
