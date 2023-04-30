@extends("layouts.base")

@section("contenido")

<form method="POST" action="{{  Request::url() }}">
    @csrf
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mb-3">
            <label for="edicion" class="form-label">Edición</label>
            <input type="text" class="form-control" id="edicion" name="edicion">
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mb-3 text-end">
            <button type="submit" class="btn btn-info">Crear</button>
        </div>
    </div>
</form>

@endsection