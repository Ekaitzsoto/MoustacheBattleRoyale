@extends("layouts.base")

@section("contenido")
<div class="card row col-12 col-sm-8 col-md-6 col-lg-4 text-center mt-2">
    <h1 class="fw-bold text-info-emphasis">Nuevo Equipo</h1>
    <form method="POST" action="{{config('app.url')}}/equipo/nuevo">
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
                <label for="presidente" class="form-label">Presidente</label>
                <input type="text" class="form-control @error('presidente') is-invalid @enderror" id="presidente" name="presidente" value="{{ old('presidente') }}">
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
