@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-black mb-6">Detalles del Usuario</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <!-- Avatar y nombre -->
        <div class="flex items-center space-x-6 mb-6">
            <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary shadow-lg">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff" alt="Avatar">
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-black">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>

        <!-- Información del usuario -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-100 p-4 rounded-md">
                <span class="font-semibold text-gray-700">Nombre:</span>
                <p class="text-black">{{ $user->name }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-md">
                <span class="font-semibold text-gray-700">Email:</span>
                <p class="text-black">{{ $user->email }}</p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="mt-6 flex space-x-3">
            <a href="{{ route('users.index') }}" class="px-6 py-3 bg-gray-500 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Volver</a>
            <a href="{{ route('users.edit', $user->id) }}" class="px-6 py-3 bg-secondary hover:bg-yellow-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Editar</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-6 py-3 bg-danger hover:bg-red-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
