@extends('layouts.base')

@section('contenido')
<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 col-12 col-lg-10">

    @if (isset($restantes))
    <div class="col">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h5 class="text-center text-info-emphasis fw-bold">Estadísticas</h5>
            </div>
            <div class="card-body">
                @include('estadisticas.estadisticas_progreso')
            </div>
        </div>
    </div>
    @endif

    @if (isset($topAsesinos))
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="text-center text-info-emphasis fw-bold">Asesinos</h4>
            </div>
            <div class="card-body">
                @include('estadisticas.estadisticas_asesinos')
            </div>
        </div>
    </div>
    @endif

    @if (isset($topAsesinos))
    <div class="col mb-5">
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="text-center text-info-emphasis fw-bold">Mejores equipos</h4>
            </div>
            <div class="card-body">
                @include('estadisticas.estadisticas_equipos')
            </div>
        </div>
    </div>
    @endif

</div>

@endsection
