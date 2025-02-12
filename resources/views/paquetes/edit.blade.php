@extends('layouts.app')

@section('content')
    <div class="container my-5 p-4 bg-light rounded shadow-lg">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <form action="{{ route('paquetes.update', $paquete->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Paquete</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $paquete->nombre) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $paquete->descripcion) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" class="form-control" value="{{ old('precio', $paquete->precio) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (días)</label>
                        <input type="number" name="duracion" id="duracion" class="form-control" value="{{ old('duracion', $paquete->duracion) }}" required min="1" oninput="generateItineraryFields()">
                    </div>

                    <div id="itinerary-container">
                        @foreach($paquete->itinerarios as $itinerario)
                            <div class="mb-3">
                                <h4>Día {{ $itinerario->dia }}</h4>
                                <label for="descripcion_{{ $itinerario->dia }}" class="form-label">Descripción del Día {{ $itinerario->dia }}</label>
                                <textarea name="itinerarios[{{ $itinerario->dia }}][descripcion]" id="descripcion_{{ $itinerario->dia }}" class="form-control" required>{{ old('itinerarios.'.$itinerario->dia.'.descripcion', $itinerario->descripcion) }}</textarea>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-success btn-lg px-4 py-2 mt-4 w-100">Actualizar Paquete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function generateItineraryFields() {
            const duration = document.getElementById('duracion').value;
            const container = document.getElementById('itinerary-container');
            container.innerHTML = '';

            for (let i = 1; i <= duration; i++) {
                const dayDiv = document.createElement('div');
                dayDiv.classList.add('mb-3');

                dayDiv.innerHTML = `
                    <h4>Día ${i}</h4>
                    <label for="descripcion_${i}" class="form-label">Descripción del Día ${i}</label>
                    <textarea name="itinerarios[${i}][descripcion]" id="descripcion_${i}" class="form-control" required></textarea>
                `;
                container.appendChild(dayDiv);
            }
        }
    </script>
@endsection
