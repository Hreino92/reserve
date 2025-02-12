@extends('layouts.app')

@section('content')

<div class="container my-5 p-4 bg-light rounded shadow-lg">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="{{ route('paquetes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Paquete</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" name="precio" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (días)</label>
                    <input type="number" name="duracion" id="duracion" class="form-control" required min="1" oninput="generateItineraryFields()">
                </div>

                <!-- Contenedor de itinerarios -->
                <div id="itinerary-container"></div>

                <button type="submit" class="btn btn-success btn-lg px-4 py-2 mt-4 w-100">Crear Paquete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function generateItineraryFields() {
        const duration = document.getElementById('duracion').value;
        const container = document.getElementById('itinerary-container');
        container.innerHTML = ''; // Limpiar el contenedor antes de agregar los campos

        for (let i = 1; i <= duration; i++) {
            const dayDiv = document.createElement('div');
            dayDiv.classList.add('mb-3');
            
            // Agregamos los campos para cada día
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
