@extends("layouts.base")

@section("contenido")

@if($guerra)
<div class="card text-center">
    <div class="card-header">
        <h1 class="text-center text-info-emphasis fw-bold">{{$guerra->nombre}}
            @if($guerra->estado == "creado")
                <span class="badge bg-info">{{$guerra->estado}}</span>
            @elseif($guerra->estado == "en curso")
                <span class="badge bg-warning">{{$guerra->estado}}</span>
            @elseif($guerra->estado == "finalizado")
                <span class="badge bg-danger">{{$guerra->estado}}</span>
            @endif
        </h1>
    </div>
</div>
@else
<div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 pt-3">
        <div class="alert alert-info" role="alert">
            <p class="text-center"><span><i class="bi bi-info-circle-fill"></i> </span>No hay ninguna guerra creada todavía.</p>
        </div>
        
    </div>
</div>
<div class="row justify-content-center">
    <div  class="col-5 text-center">
        <a class="btn btn-info" href="{{config('app.url')}}/guerra/nueva">Nueva Guerra</a>
    </div>
</div>
@endif

@endsection