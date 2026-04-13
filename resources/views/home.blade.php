@extends("layouts.base", ['hideFooter' => true])

@section("contenido")

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="{{ asset('js/home.js') }}" defer></script>

<div id="titulo" class="fisico titulo-contenedor">
    <h1 class="titulo-presentacion-zoom text-info text-uppercase">
        MOUSTACHE<br>BATTLE ROYALE
    </h1>
</div>

@endsection