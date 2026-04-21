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