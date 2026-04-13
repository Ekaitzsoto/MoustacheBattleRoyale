@extends('layouts.base')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/historial.css') }}">

<div class="row row-cols-1 col-12">
    <div class="col">
        <div class="card text-bg-dark mt-3 mb-5">
            <div class="card-header">
                <h2 class="text-center text-info text-uppercase fw-bold m-0">Historial</h2>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionGuerras">
                    @forelse ($guerras as $guerra)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$guerra->id}}">
                                    @php
                                        $badgeColor = [
                                            'Creado' => 'bg-info',
                                            'En curso' => 'bg-warning',
                                            'Finalizada' => 'bg-danger'
                                        ][$guerra->estado] ?? 'bg-secondary';
                                    @endphp
                                    <span class="badge {{ $badgeColor }} me-3">{{ $guerra->estado }}</span>
                                    <span class="fw-bold">{{ $guerra->nombre }}</span>
                                </button>
                            </h2>
                            
                            <div id="collapse{{$guerra->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionGuerras">
                                <div class="accordion-body">
                                    @if($guerra->equipos->isEmpty())
                                        <div class="alert alert-info border-0 bg-transparent m-0">
                                            <i class="bi bi-info-circle-fill me-2"></i> No hay datos disponibles.
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <p class="mb-1"><strong>Ganador:</strong> {{ $guerra->ganador ?: "No tiene ganador todavía" }}</p>
                                            </div>
                                            <div class="col-12 col-md-6 border-start border-secondary">
                                                <ul class="list-unstyled mb-0">
                                                    <li><strong>Equipos:</strong> {{ $guerra->equipos->count() }}</li>
                                                    <li><strong>Jugadores:</strong> {{ $guerra->jugadores->count() }}</li>
                                                    <li><strong>Fecha:</strong> {{ $guerra->created_at->format('d/m/Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <p class="text-muted-custom">No hay registros de guerras.</p>
                            <a class="btn btn-outline-info btn-sm" href="{{ url('/guerra/nueva') }}">Crear Guerra</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection