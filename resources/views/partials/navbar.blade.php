<nav class="bg-white shadow-md" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="shrink-0">
                <a href="{{ url('/') }}">
                    <x-application-logo class="block h-9 w-auto" />
                </a>
            </div>

            <!-- Menu de navegación -->
            <div class="hidden sm:flex space-x-8 sm:-my-px sm:ms-10">
                <a href="{{ url('/') }}" class="text-gray-900 hover:text-blue-500">Inicio</a>
                <a href="{{ route('elsalvador') }}" class="text-gray-900 hover:text-blue-500">El Salvador</a>
                <a href="{{ route('services') }}" class="text-gray-900 hover:text-blue-500">Servicios</a>
                <a href="{{ route('contact') }}" class="text-gray-900 hover:text-blue-500">Contacto</a>
            </div>

            <!-- Botón de menú de hamburguesa -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="text-gray-900 hover:text-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú desplegable en móviles -->
    <div x-show="open" @click.away="open = false" class="sm:hidden bg-white shadow-md">
        <div class="space-y-1">
            <a href="{{ url('/') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">Inicio</a>
            <a href="{{ route('elsalvador') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">El Salvador</a>
            <a href="{{ route('services') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">Servicios</a>
            <a href="{{ route('contact') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">Contacto</a>
        </div>
    </div>
</nav>