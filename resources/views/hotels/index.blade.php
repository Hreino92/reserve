@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Hoteles</h1>

    <div class="text-end mb-3">
        <a href="{{ route('hotels.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear nuevo hotel
        </a>
    </div>

    @if ($hotels->isEmpty())
        <div class="alert alert-info text-center">No hay hoteles disponibles.</div>
    @else
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <h5 class="card-title display-6">{{ $hotel->name }}</h5>

                        @if($hotel->image)
                            <img src="{{ asset('storage/' . $hotel->image) }}" class="card-img-top img-square" alt="Imagen de {{ $hotel->name }}">
                        @else
                            <div class="text-center p-3">
                                <i class="fas fa-building fa-5x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            
                            <p class="card-text">{{ $hotel->description }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este hotel?')">
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

<style>
    /* Estilos para hacer las imágenes cuadradas */
    .img-square {
        width: 100%;
        height: 200px; /* Altura fija para que la imagen sea cuadrada */
        object-fit: cover; /* Recorta la imagen y ajusta a su contenedor sin deformarse */
    }
</style>
@endsection
