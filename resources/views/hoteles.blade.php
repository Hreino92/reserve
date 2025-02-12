@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Hoteles</h1>

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
