@if($guerra)

<div class="card text-bg-dark text-center mt-3">

    @include('guerra/guerra_info/guerra_cabecera')

    <div class="card-body">

        @include('alerts')

        @include('guerra/guerra_info/guerra_botonera')

        <hr class="opacity-10">
        
        @include('guerra/guerra_info/guerra_accordion')
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