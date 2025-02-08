<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Cargar Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Asegúrate de que Alpine.js esté cargado -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-50 text-gray-900">
    @include('partials.navbar')

    <!-- Contenedor del Carrusel -->
    <div class="container mx-auto px-4 py-12">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/carousel1.png') }}" class="d-block w-full h-auto rounded-lg shadow-lg" alt="Imagen 1" style="max-width: 720px; max-height: 480px; margin: 0 auto;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white text-2xl font-semibold">Primera Imagen</h5>
                        <p class="text-white text-lg">Descripción de la primera imagen. Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel2.png') }}" class="d-block w-full h-auto rounded-lg shadow-lg" alt="Imagen 2" style="max-width: 720px; max-height: 480px; margin: 0 auto;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white text-2xl font-semibold">Segunda Imagen</h5>
                        <p class="text-white text-lg">Descripción de la segunda imagen. Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel3.png') }}" class="d-block w-full h-auto rounded-lg shadow-lg" alt="Imagen 3" style="max-width: 720px; max-height: 480px; margin: 0 auto;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white text-2xl font-semibold">Tercera Imagen</h5>
                        <p class="text-white text-lg">Descripción de la tercera imagen. Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-gray-800 rounded-full p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-gray-800 rounded-full p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>


    <div class="container mx-auto px-4 py-12">
        <h2 class="text-4xl font-semibold text-center text-gray-900 mb-6">¡Descubre la innovación con <span class="text-blue-500">reserve503.travel</span>!</h2>
        <p class="text-lg text-gray-700 mb-8">
            Esta plataforma revolucionaria fusiona los servicios de <strong>Viajes Universales</strong>, <strong>Tours Universales</strong> y <strong>Wellness El Salvador</strong> en una experiencia de reservas personalizadas. Es la solución definitiva, ofreciendo comodidad y practicidad a nuestros clientes.
        </p>

        <p class="text-lg text-gray-700 mb-8">
            Con una amplia gama de opciones turísticas, desde aventuras culturales hasta retiros de bienestar, nuestra plataforma integra lo mejor de cada marca para brindar una experiencia única de viaje. ¡Viaja con facilidad, atención y personalización, elige tu destino de preferencia y disfruta de una experiencia excepcional!
        </p>

        <p class="text-lg text-gray-700 mb-8">
            <span class="font-semibold">reserve503.travel</span> es la nueva forma de explorar, simplificando la planificación de viajes con una oferta diversa y un servicio inigualable a tan solo un click desde tu teléfono o computadora, ¡y llegamos a la puerta de tu casa!
        </p>

        <h3 class="text-3xl font-semibold text-center text-gray-900 mb-4">Conoce más de nosotros a continuación:</h3>

        <!-- Cards -->

        <div class="container  my-5 p-4 bg-light rounded shadow-lg">
            <h1 class="green-text text-center" data-section="brands" data-value="title">Nuestras marcas</h1>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col zoom-effect">
                    <div class="card h-100">
                        <img src="{{asset('img/logovu.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Viajes Universales</h5>
                            <p class="card-text" data-section="card1" data-value="text">
                                <b> Viajes Universales</b> se distingue como la agencia de viajes de excelente atención, ofreciendo una
                                amplia gama de servicios y
                                conexiones globales. Nuestra red de socios comerciales a nivel mundial garantiza opciones variadas y
                                experiencias únicas en el
                                destino de su elección. Destacamos por nuestro servicio personalizado, adaptando cada itinerario a las
                                preferencias individuales
                                y presupuesto de nuestros viajeros. Desde reservas de vuelos y alojamiento hasta excursiones a medida, nos
                                comprometemos a brindar
                                una atención meticulosa y soluciones a medida para cada cliente. Con Viajes Universales, experimenta la
                                comodidad de explorar el
                                mundo con un servicio excepcional y una atención personalizada que supera tus expectativas.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted" data-section="card1" data-value="since">Desde el año 2000</small>
                        </div>
                    </div>
                </div>
                <div class="col zoom-effect">
                    <div class="card h-100">
                        <img src="{{asset('img/logotu.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tours Universales</h5>
                            <p class="card-text" data-section="card2" data-value="text">
                                <b>Tours universales</b> es líder en experiencias turísticas, destaca como uno de los operadores de
                                turismo con experiencia en
                                El Salvador, con más de 20 años de experiencia. Ofrecemos un abanico de opciones que resaltan la riqueza
                                cultural y natural del país.
                                Con un enfoque en la excelencia, brindamos itinerarios personalizados, guiados por expertos locales,
                                permitiendo a los viajeros
                                explorar los tesoros escondidos de El Salvador. Además, nuestra red de acción se extiende a lo largo de
                                Centroamérica,
                                facilitando conexiones para descubrir la diversidad única de la región. Con Tours Universales, descubre la
                                autenticidad de El Salvador
                                y la proximidad cultural de Centroamérica en cada paso de tu viaje.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted" data-section="card2" data-value="since">Desde el año 2004</small>
                        </div>
                    </div>
                </div>
                <div class="col zoom-effect">
                    <div class="card h-100">
                        <img src="{{asset('img/logowe.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text">Wellness El Salvador</h5>
                             <p class="card-text" data-section="card3" data-value="text">
                                <b>Wellness El Salvador</b> se destaca como un operador turístico centrado en el bienestar, ofreciendo
                                experiencias transformadoras para
                                el cuerpo y la mente. Nuestros programas están diseñados para nutrir el equilibrio interior, combinando
                                retiros de yoga, meditación y
                                tratamientos de spa en entornos serenos y naturales de El Salvador. Con un enfoque holístico, fomentamos
                                la armonía personal y la
                                conexión con la naturaleza, permitiendo a los viajeros revitalizarse completamente. Wellness El Salvador
                                se compromete a ofrecer escapadas
                                rejuvenecedoras y experiencias enriquecedoras que promueven el bienestar integral, invitando a sumergirse
                                en un viaje transformador hacia
                                la salud y la felicidad.
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted" data-section="card3" data-value="since">Desde el año 2015</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>



    <!-- Cargar el script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>