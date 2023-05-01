@extends("layouts.base")

@section("contenido")
<div class="card row col-12 col-sm-8 col-md-6 col-lg-4 text-center mt-2">
    <h1 class="fw-bold text-info-emphasis">Nuevo Equipo</h1>
    <form method="POST" action="{{  Request::url() }}">
        @csrf
        <div class="row justify-content-center text-start">
            <div class="col-12 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
        </div>

        <div class="row justify-content-center text-start">
            <div class="col-12 mb-3">
                <label for="presidente" class="form-label">Presidente</label>
                <input type="text" class="form-control" id="presidente" name="presidente">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 mb-3 text-end">
                <button type="submit" class="btn btn-info">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection
