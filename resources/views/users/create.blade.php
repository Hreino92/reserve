@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-black mb-6">Crear Nuevo Usuario</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>

            <!-- Botones de acción -->
            <div class="mt-6 flex space-x-3">
                <a href="{{ route('users.index') }}" class="px-6 py-3 bg-gray-500 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Cancelar</a>
                <button type="submit" class="px-6 py-3 bg-primary hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Crear Usuario</button>
            </div>
        </form>
    </div>
</div>
@endsection
