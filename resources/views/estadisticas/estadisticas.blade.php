@extends('layouts.base')

@section('contenido')
<div class="row row-cols-1 col-12">

    @if (isset($restantes))
    <div class="col">
        <div class="card text-bg-dark mt-3 mb-3">
            <div class="card-header">
                <h2 class="text-center text-info text-uppercase fw-bold">Estadísticas</h2>
            </div>
            <div class="card-body">
                @include('estadisticas.estadisticas_progreso')
            </div>
        </div>
    </div>
    @endif

    @if (isset($topAsesinos))
    <div class="col">
        <div class="card text-bg-dark mb-3">
            <div class="card-header">
                <h2 class="text-center text-info text-uppercase fw-bold">Asesinos</h2>
            </div>
            <div class="card-body">
                @include('estadisticas.estadisticas_asesinos')
            </div>
        </div>
    </div>
    @endif

    @if (isset($topAsesinos))
    <div class="col">
        <div class="card text-bg-dark">
            <div class="card-header">
                <h2 class="text-center text-info text-uppercase fw-bold">Mejores equipos</h2>
            </div>
            <div class="card-body">
                @include('estadisticas.estadisticas_equipos')
            </div>
        </div>
    </div>
    @endif

</div>

@endsection
