@extends('layouts.app')

@section('content')
    <style>
        .img-square {
            width: 100%;
            /* Ajusta el ancho al 100% del contenedor */
            height: 250px;
            /* Altura fija para hacerla cuadrada */
            object-fit: cover;
            /* Recorta la imagen para ajustarse sin deformarse */
            display: block;
        }
    </style>
    
    <div class="container mt-4">
        <div class="bg-light p-4 rounded shadow-sm">
            <h1 class="text-center text-primary mb-4 fs-4">Servicios de Transporte</h1>

            @if ($services->isEmpty())
                <div class="alert alert-info text-center">No hay servicios de transporte disponibles.</div>
            @else
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                @if ($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                        class="card-img-top img-fluid img-square" 
                                        alt="Imagen de {{ $service->name }}">
                                @else
                                    <div class="text-center p-3">
                                        <i class="fas fa-bus fa-5x text-muted"></i>
                                    </div>
                                @endif

                                <div class="card-body">
                                    <h3 class="card-title fw-bold text-primary fs-4">{{ $service->name }}</h3>
                                    <p class="card-text text-muted fs-6">{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
