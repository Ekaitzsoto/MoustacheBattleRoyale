@extends("layouts.base")

@php
    $isEdit = isset($equipo);
    $titulo = $isEdit ? 'Editar Equipo' : 'Nuevo Equipo';
    $textoBoton = $isEdit ? 'Actualizar' : 'Crear';
    
    $action = $isEdit ? url("/equipo/{$equipo->id}/update") : url("/equipo/nuevo");
@endphp

@section("contenido")
<div class="card text-bg-dark row col-12 col-sm-8 col-md-6 col-lg-4 text-center mt-2">
    <h1 class="fw-bold text-info text-uppercase">{{ $titulo }}</h1>
    
    <form method="POST" action="{{ $action }}">
        @csrf
        
        @if($isEdit)
            @method('PUT')
        @endif

        @if ($errors->any())
            <div class="alert alert-danger p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger small">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center text-start">
            <div class="col-12 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control bg-transparent text-light @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $equipo->nombre ?? '') }}">
            </div>
        </div>
        
        <div class="row justify-content-center text-start">
            <div class="col-12 mb-3">
                <label for="presidente" class="form-label">Presidente</label>
                <input type="text" class="form-control bg-transparent text-light @error('presidente') is-invalid @enderror" id="presidente" name="presidente" value="{{ old('presidente', $equipo->presidente ?? '') }}">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 mb-3 text-end">
                <button type="submit" class="btn btn-outline-info text-uppercase">{{ $textoBoton }}</button>
            </div>
        </div>
    </form>
</div>
@endsection