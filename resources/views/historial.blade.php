@extends('layouts.base')

@section('contenido')

<div class="row row-cols-1 col-12 col-lg-10">
    <div class="col">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 pt-3">
                <div class="accordion" id="accordionEquipos">
                    @forelse ($guerras as $guerra)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button d-flex justify-content-between collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$guerra->id}}" aria-expanded="true" aria-controls="collapse{{$guerra->id}}">
                                    <span class="ms-2 me-auto badge {{$guerra->estado == 'Creado' ? 'bg-info' : ''}} {{$guerra->estado == 'Finalizada' ? 'bg-danger' : ''}} {{$guerra->estado == 'En curso' ? 'bg-warning' : ''}}">{{$guerra->estado}}</span>
                                    <span class="ms-2 me-auto">{{$guerra->nombre}}</span>
                                </button>
                            </h2>
                            <div id="collapse{{$guerra->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionGuerras">
                                <div class="accordion-body">
                                    <ol class="list-group list-group-numbered">
                                        @forelse($guerra->equipos()->get() as $equipo)
                                        <ul><strong>Ganador:</strong> {{$guerra->ganador ? $guerra->ganador : "-"}}</ul>
                                        <hr>
                                        <ul><strong>Equipos:</strong> {{$guerra->equipos()->count()}}</ul>
                                        <ul><strong>Jugadores:</strong> {{$guerra->jugadores()->count()}}</ul>
                                        <ul><strong>Creado:</strong> {{$guerra->created_at}}</ul>
                                        @empty
                                        <div class="alert alert-info" role="alert">
                                            <p class="text-center"><span><i class="bi bi-info-circle-fill"></i> </span>No hay equipos todavía.</p>
                                        </div>
                                        @endforelse
                                    </ol>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info" role="alert">
                            <p class="text-center"><span><i class="bi bi-info-circle-fill"></i> </span>No hay registros de guerras anteriores en la base de datos.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
