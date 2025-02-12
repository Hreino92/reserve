@extends('layouts.app')

@section('content')
    <div class="container my-5 p-4 bg-light rounded shadow-lg">
        <div class="d-flex justify-content-between align-items-center bg-white p-4 rounded shadow-sm border">
            <h2 class="fw-bold text-primary mb-0 text-uppercase">
                Explora El Salvador, Aventuras, Relax y Experiencias
            </h2>
            <a href="{{ route('paquetes.create') }}" class="btn btn-success btn-lg px-4 py-2 d-flex align-items-center gap-2 shadow">
                <i class="bi bi-plus-circle fs-4"></i> <span>Nuevo Paquete</span>
            </a>
        </div>

        <div class="container py-5">
            @foreach($paquetesAgrupados as $duracion => $paquetes)
                <h3 class="fw-bold text-secondary my-4 text-center">Paquetes de {{ $duracion }} día(s)</h3>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($paquetes as $paquete)
                        <div class="col">
                            <div class="card shadow-sm border-light">
                                <img class="card-img-top" src="{{ asset('storage/'.$paquete->imagen) }}" alt="Imagen del paquete" 
                                     style="width: 100%; height: 250px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $paquete->nombre }}</h5>
                                    <p class="card-text">{{ $paquete->descripcion }}</p>
                                    <p class="card-text"><strong>Precio:</strong> ${{ $paquete->precio }}</p>
                                    <p class="card-text"><strong>Duración:</strong> {{ $paquete->duracion }} días</p>
                                </div>
                                <div class="card-footer">
                                    <a href="javascript:void(0);" class="text-primary" data-bs-toggle="modal" 
                                       data-bs-target="#paqueteModal" data-id="{{ $paquete->id }}" 
                                       data-nombre="{{ $paquete->nombre }}" 
                                       data-descripcion="{{ $paquete->descripcion }}" 
                                       data-precio="{{ $paquete->precio }}" 
                                       data-duracion="{{ $paquete->duracion }}" 
                                       data-imagen="{{ asset('storage/'.$paquete->imagen) }}" 
                                       data-itinerarios="{{ json_encode($paquete->itinerarios) }}">
                                        Ver más detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paqueteModal" tabindex="-1" aria-labelledby="paqueteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paqueteModalLabel">Detalles del Paquete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 id="modalNombre"></h3>
                    <img id="modalImagen" class="img-fluid mb-3" alt="Imagen del paquete">
                    <p id="modalDescripcion"></p>
                    <p><strong>Precio:</strong> $<span id="modalPrecio"></span></p>
                    <p><strong>Duración:</strong> <span id="modalDuracion"></span> días</p>

                    <h4>Itinerarios:</h4>
                    <ul id="modalItinerarios" class="list-group list-group-flush"></ul>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" id="editPaqueteBtn" class="btn btn-warning">Editar</a>
                    
                    <!-- Botón para eliminar el paquete -->
                    <form id="deleteForm" action="{{ route('paquetes.destroy', 'paquete_id') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="deletePaqueteBtn" class="btn btn-danger">Eliminar</button>
                    </form>
                
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                
            </div>
        </div>
    </div>

    <script>
       document.addEventListener("DOMContentLoaded", function() {
    const verMasLinks = document.querySelectorAll('[data-bs-toggle="modal"]');
    
    verMasLinks.forEach(link => {
        link.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nombre = this.getAttribute('data-nombre');
            const descripcion = this.getAttribute('data-descripcion');
            const precio = this.getAttribute('data-precio');
            const duracion = this.getAttribute('data-duracion');
            const imagen = this.getAttribute('data-imagen');
            const itinerarios = JSON.parse(this.getAttribute('data-itinerarios'));

            document.getElementById('modalNombre').textContent = nombre;
            document.getElementById('modalDescripcion').textContent = descripcion;
            document.getElementById('modalPrecio').textContent = precio;
            document.getElementById('modalDuracion').textContent = duracion;
            document.getElementById('modalImagen').src = imagen;

            const itinerariosList = document.getElementById('modalItinerarios');
            itinerariosList.innerHTML = ''; // Limpiar cualquier contenido previo
            itinerarios.forEach(itinerario => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item');
                listItem.innerHTML = `<strong>Día ${itinerario.dia}:</strong> ${itinerario.descripcion}`;
                itinerariosList.appendChild(listItem);
            });

            // Establecer la URL de edición del paquete
            const editBtn = document.getElementById('editPaqueteBtn');
            editBtn.setAttribute('href', `/paquetes/${id}/edit`);

            // Establecer la URL del formulario de eliminación con el ID del paquete
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('action', `/paquetes/${id}`);
        });
    });
});

    </script>
@endsection
