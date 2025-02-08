@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-black mb-6">Usuarios</h1>

    <!-- Botón para crear usuario -->
    <a href="{{ route('users.create') }}" class="mb-4 inline-block px-6 py-3 bg-primary hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">Crear Nuevo Usuario</a>
    
    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Nombre</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b">
                    <td class="py-3 px-6 text-sm text-black">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6 text-sm text-black">{{ $user->name }}</td>
                    <td class="py-3 px-6 text-sm text-black">{{ $user->email }}</td>
                    <td class="py-3 px-6 text-sm">
                        <!-- Botones de acciones -->
                        <a href="{{ route('users.show', $user->id) }}" class="inline-block bg-success hover:bg-green-700 text-white py-2 px-4 rounded-md shadow-sm transition duration-200 mb-2">Ver</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="inline-block bg-secondary hover:bg-yellow-700 text-white py-2 px-4 rounded-md shadow-sm transition duration-200 mb-2">Editar</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-danger hover:bg-red-700 text-white py-2 px-4 rounded-md shadow-sm transition duration-200">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
