@extends('layouts.base')

@section('contenido')

<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 col-12 col-lg-10">
    <div class="col">
        @include('guerra_info')
    </div>
    <div class="col">
        @if($guerra!=null && $guerra->estado != "Creado")
        @include('guerra_actividad')
        @endif
    </div>
</div>

@endsection
