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
    <div class="container">
        <h1 class="text-center mb-4">Servicios de Transporte</h1>

        <div class="text-end mb-3">
            <a href="{{ route('transport-services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear nuevo
            </a>
        </div>

        @if ($services->isEmpty())
            <div class="alert alert-info text-center">No hay servicios de transporte disponibles.</div>
        @else
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}"
                                    class="card-img-top img-fluid img-square" alt="Imagen de {{ $service->name }}">
                            @else
                                <div class="text-center p-3">
                                    <i class="fas fa-bus fa-5x text-muted"></i>
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $service->name }}</h5>
                                <p class="card-text">{{ $service->description }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('transport-services.edit', $service->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('transport-services.destroy', $service->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este servicio?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
