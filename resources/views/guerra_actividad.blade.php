<div class="card mt-3">
    <div class="card-header">Actividad</div>
    <div class="card-body">
        <ol class="list-group list-group-numbered">
            @forelse($asesinatos as $asesinato)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1">Texto del asesinato</p>
                    <small>3 days ago</small>
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
