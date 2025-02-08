@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-black mb-6">Editar Usuario</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="mt-1 block w-full p-3 border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
            </div>

            <!-- Botones de acción -->
            <div class="mt-6 flex space-x-3">
                <a href="{{ route('users.index') }}" class="px-6 py-3 bg-gray-500 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Cancelar</a>
                <button type="submit" class="px-6 py-3 bg-success hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection
