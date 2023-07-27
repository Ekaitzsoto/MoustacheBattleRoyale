@extends("layouts.base")

@section("contenido")
<div class="card row col-12 col-sm-8 col-md-6 col-lg-4 text-center mt-2">
    <h1 class="fw-bold text-info-emphasis">Nueva Guerra</h1>
    <form method="POST" action="{{config('app.url')}}/guerra/nueva">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center text-start">
            <div class="col-12 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
            </div>
        </div>

        <div class="row justify-content-center text-start">
            <div class="col-12 mb-3">
                <label for="jugadores_equipo" class="form-label">Máximo de jugadores por equipo</label>
                <input type="number" class="form-control @error('jugadores_equipo') is-invalid @enderror" id="jugadores_equipo" name="jugadores_equipo" value="{{ old('jugadores_equipo') }}">
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
