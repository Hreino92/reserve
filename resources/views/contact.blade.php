@extends('layouts.app')

@section('content')
<div class="container my-5 p-4 bg-light rounded shadow-lg">
    <div class="container">
        <div class="row align-items-center">
            <!-- Columna 1: Texto -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 mb-lg-0">
                <h2 data-section="contactpage" data-value="headline" class="display-4 text-success fw-bold">¡Estamos aquí para ti, sin importar en qué parte del mundo te encuentres!</h2>
                <h6 data-section="contactpage" data-value="text" class="text-muted fs-5">
                    Nuestro equipo combina tecnología de punta con un trato cercano y personalizado para que planificar tu próximo viaje sea una experiencia fácil y emocionante. Ya sea por chat, correo o redes sociales, estamos listos para responder tus preguntas y ayudarte a crear la aventura perfecta. Contáctanos y descubre lo sencillo que es viajar con nosotros.
                </h6>
                <h3 data-section="contactpage" data-value="endline" class="text-success mt-4 fw-bold">¡Tu próxima aventura comienza con un clic!</h3>
            </div>
            <!-- Columna 2: Imagen -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
                <img src="{{ asset('/img/customer_service.png') }}" class="img-fluid rounded-circle shadow" style="max-width: 80%;" alt="Customer Service">
            </div>
            <!-- Columna 3: Card -->
            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                <div class="card h-100 shadow-lg border-light">
                    <div class="card-body align-items-center d-flex flex-column">
                        <img src="{{ asset('/img/logoreserve.png') }}" alt="Logo reserve503" class="card-logo mb-3" style="max-width: 240px;">
                        <h5 class="card-title text-success fw-bold mb-3" data-section="contactpage" data-value="ourcontact">Nuestros contactos:</h5>
                        <div class="contact-info">
                            <a href="https://wa.me/50368542459" class="d-block mb-3 text-decoration-none fs-5 text-success">
                                <i class="bi bi-whatsapp fs-4 me-2"></i> +50368542459
                            </a>
                            <a href="mailto:info@reserve503.travel" class="d-block mb-3 text-decoration-none fs-5 text-success">
                                <i class="bi bi-envelope fs-4 me-2"></i> info@reserve503.travel
                            </a>
                            <span class="d-block mb-3 fs-5 text-success">
                                <i class="bi bi-telephone-fill fs-4 me-2"></i> +503 2413-2002
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
