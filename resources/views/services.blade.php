@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container d-flex justify-content-center">
    <div class="row w-100">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
            <div class="card shadow p-4">
                <h2 class="text-center mb-4">Solicitud de Cotización</h2>
                <form action="{{ route('enviar.cotizacion') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono:</label>
                        <input type="number" name="telefono" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de servicio:</label>
                        <div>
                            <input type="radio" name="tipo" value="paquetes" class="form-check-input" onclick="mostrarOpciones('paquetes')"> Paquetes
                            <input type="radio" name="tipo" value="transporte" class="form-check-input" onclick="mostrarOpciones('transporte')"> Transporte
                            <input type="radio" name="tipo" value="hoteles" class="form-check-input" onclick="mostrarOpciones('hoteles')"> Hoteles
                            <input type="radio" name="tipo" value="boletos" class="form-check-input" onclick="mostrarOpciones('boletos')"> Boletos
                        </div>
                    </div>
                    <div class="mb-3" id="selectOpciones" style="display: none;">
                        <label class="form-label">Seleccione una opción:</label>
                        <select name="opcionSeleccionada" class="form-control">
                        </select>
                    </div>

                    <!-- Campos adicionales para boletos -->
                    <div id="boletosCampos" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">Ciudad de origen:</label>
                            <input type="text" name="ciudad_origen" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ciudad de destino:</label>
                            <input type="text" name="ciudad_destino" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">¿Incluir equipaje de carga?</label>
                            <div>
                                <input type="radio" name="equipaje" value="si" class="form-check-input"> Sí
                                <input type="radio" name="equipaje" value="no" class="form-check-input"> No
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Clase de viaje:</label>
                            <div>
                                <input type="radio" name="clase_viaje" value="turista" class="form-check-input"> Turista
                                <input type="radio" name="clase_viaje" value="ejecutiva" class="form-check-input"> Ejecutiva
                            </div>
                        </div>
                    </div>

                    <!-- Calendarios para fecha de inicio y final -->
                    <div class="mb-3">
                        <label class="form-label">Fecha de inicio:</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de finalización:</label>
                        <input type="date" name="fecha_final" class="form-control" required>
                    </div>

                    <!-- Campo para comentarios -->
                    <div class="mb-3">
                        <label class="form-label">Comentarios:</label>
                        <textarea name="comentarios" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarOpciones(tipo) {
        const selectOpciones = document.getElementById('selectOpciones');
        const select = selectOpciones.querySelector('select');
        select.innerHTML = '';  // Limpiar opciones previas
        let opciones = [];

        if (tipo === 'paquetes') {
            opciones = @json($paquetes).map(item => ({ value: item.nombre, text: item.nombre }));
        } else if (tipo === 'transporte') {
            opciones = @json($transportServices).map(item => ({ value: item.name, text: item.name }));
        } else if (tipo === 'hoteles') {
            opciones = @json($hotels).map(item => ({ value: item.name, text: item.name }));
        }

        if (opciones.length > 0) {
            opciones.forEach(opcion => {
                let optionElement = document.createElement('option');
                optionElement.value = opcion.value;  // Asignamos el nombre legible
                optionElement.textContent = opcion.text;  // Mostrar texto legible
                select.appendChild(optionElement);
            });
            selectOpciones.style.display = 'block';
        } else {
            selectOpciones.style.display = 'none';
        }

        // Mostrar campos adicionales si se selecciona "boletos"
        if (tipo === 'boletos') {
            document.getElementById('boletosCampos').style.display = 'block';
        } else {
            document.getElementById('boletosCampos').style.display = 'none';
        }
    }
</script>
@endsection
