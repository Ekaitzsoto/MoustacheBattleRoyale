@extends('layouts.base')

@section('contenido')

@if($guerra!=null && ($guerra->estado == "En curso" || $guerra->estado == "Finalizado"))

<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 col-12 col-lg-10">
    <div class="col">
        @include('guerra_info')
    </div>
    <div class="col">
        @include('guerra_actividad')
    </div>
</div>
@else

<div class="row row-cols-1 col-12 col-lg-10">
    <div class="col">
        @include('guerra_info')
    </div>
</div>

@endif

@endsection
