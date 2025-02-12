@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Crear Nuevo Hotel</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Hotel</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Categoría</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="1 estrella" {{ old('category', $hotel->category ?? '') == '1 estrella' ? 'selected' : '' }}>1 estrella</option>
                                <option value="2 estrellas" {{ old('category', $hotel->category ?? '') == '2 estrellas' ? 'selected' : '' }}>2 estrellas</option>
                                <option value="3 estrellas" {{ old('category', $hotel->category ?? '') == '3 estrellas' ? 'selected' : '' }}>3 estrellas</option>
                                <option value="4 estrellas" {{ old('category', $hotel->category ?? '') == '4 estrellas' ? 'selected' : '' }}>4 estrellas</option>
                                <option value="5 estrellas" {{ old('category', $hotel->category ?? '') == '5 estrellas' ? 'selected' : '' }}>5 estrellas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen del Hotel</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Crear Hotel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
