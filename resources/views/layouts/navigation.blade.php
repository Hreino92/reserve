<nav class="bg-white shadow-md" x-data="{ open: false, dropdownOpen: false, elSalvadorOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="shrink-0">
                <a href="{{ url('/') }}">
                    <x-application-logo class="block" style="height: auto; width: 100%; max-width: 200px;" />
                </a>
                
            </div>

            <!-- Menú de navegación -->
            <div class="hidden sm:flex space-x-8 sm:-my-px sm:ms-10">
                <a href="{{ url('/') }}" class="text-gray-900 hover:text-blue-500">Inicio</a>

                <!-- Dropdown El Salvador -->
                <div class="relative">
                    <button @click="elSalvadorOpen = !elSalvadorOpen" class="text-gray-900 hover:text-blue-500 flex items-center">
                        El Salvador
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="elSalvadorOpen" @click.away="elSalvadorOpen = false" class="absolute left-0 mt-2 bg-white border border-gray-200 rounded-md shadow-lg w-48">
                        <a href="{{ route('elsalvador') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Paquetes Turísticos</a>
                        <a href="{{ route('transporte') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Transporte</a>
                        <a href="{{ route('hoteles') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Hoteles</a>
                    </div>
                </div>

                <a href="{{ route('services') }}" class="text-gray-900 hover:text-blue-500">Cotizar Servicios</a>
                <a href="{{ route('about-us') }}" class="text-gray-900 hover:text-blue-500">Sobre nosotros</a>
                <a href="{{ route('contact') }}" class="text-gray-900 hover:text-blue-500">Contacto</a>

                <!-- Verificar si el usuario es admin usando el campo is_admin -->
                @if(auth()->user() && auth()->user()->is_admin == 1)
                    <!-- Dropdown de administración -->
                    <div class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="text-gray-900 hover:text-blue-500 flex items-center">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 bg-white border border-gray-200 rounded-md shadow-lg w-48">
                            <a href="{{ route('users.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Usuarios</a>
                            <a href="{{ route('paquetes.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Paquetes</a>
                            <a href="{{ route('transport-services.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Transporte</a>
                            <a href="{{ route('hotels.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Hoteles</a>
                            {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Dashboard</a> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                @endif
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

            <!-- Dropdown El Salvador -->
            <div class="relative">
                <button @click="elSalvadorOpen = !elSalvadorOpen" class="w-full text-left text-gray-900 hover:text-blue-500 px-4 py-2">
                    El Salvador
                    <svg class="ml-1 h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="elSalvadorOpen" @click.away="elSalvadorOpen = false" class="bg-white border border-gray-200 rounded-md shadow-lg">
                    <a href="{{ route('paquetes.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Paquetes Turísticos</a>
                    <a href="{{ route('transporte') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Transporte</a>
                    <a href="{{ route('hoteles') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Hoteles</a>
                </div>
            </div>

            <a href="{{ route('services') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">Cotizar servicios</a>
            <a href="{{ route('about-us') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">Sobre nosotros</a>
            <a href="{{ route('contact') }}" class="block text-gray-900 hover:text-blue-500 px-4 py-2">Contacto</a>

            <!-- Verificar si el usuario es admin usando el campo is_admin -->
            @if(auth()->user() && auth()->user()->is_admin == 1)
                <!-- Dropdown en móvil -->
                <div class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="w-full text-left text-gray-900 hover:text-blue-500 px-4 py-2">
                        {{ Auth::user()->name }}
                        <svg class="ml-1 h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="bg-white border border-gray-200 rounded-md shadow-lg">
                        <a href="{{ route('users.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Usuarios</a>
                        <a href="{{ route('paquetes.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Paquetes</a>
                        <a href="{{ route('transport-services.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Transporte</a>
                        <a href="{{ route('hotels.index') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Hoteles</a>
                        {{-- <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Dashboard</a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
