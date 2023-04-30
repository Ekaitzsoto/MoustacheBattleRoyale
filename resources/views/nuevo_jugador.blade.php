@extends("layouts.base")

@section("contenido")
<div class="row text-center mt-2">
    <h1 class="fw-bold text-info-emphasis">Nuevo Jugador</h1>
</div>
<form method="POST" action="{{config('app.url')}}/jugador/nuevo">
    @csrf
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
    </div>
    <input type="hidden" name="idEquipo" value="{{$idEquipo}}"/>
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mb-3 text-end">
            <button type="submit" class="btn btn-info">Crear</button>
        </div>
    </div>
</form>

@endsection
