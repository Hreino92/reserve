@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Editar Servicio de Transporte</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('transport-services.update', $transportService->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Servicio</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $transportService->name) }}" required>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $transportService->description) }}</textarea>
                        </div>

                        <!-- Imagen -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen del Servicio</label>
                            <input type="file" id="image" name="image" class="form-control">
                            @if($transportService->image)
                                <img src="{{ asset('storage/' . $transportService->image) }}" alt="Imagen actual" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('transport-services.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
