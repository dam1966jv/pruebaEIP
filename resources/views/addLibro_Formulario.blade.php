@extends('app')
@section('title', 'Formulario añadir Libro')
@section('content')
<div class="flex items-center justify-center mt-10">
<div class="bg-white p-8 rounded-lg shadow-lg w-96 mt-10">
        <h2 class="text-2xl font-semibold mb-4">Añadir Libro</h2>
        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('addLibro') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
                <input type="text" name="titulo" id="titulo"
                    class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                @error('titulo')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="autor" class="block text-sm font-medium text-gray-700">Autor:</label>
                <input type="text" name="autor" id="autor"
                    class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                @error('autor')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="año_publicacion" class="block text-sm font-medium text-gray-700">Año de Publicación:</label>
                <input type="text" name="año_publicacion" id="año_publicacion"
                    class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                @error('año_publicacion')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="genero" class="block text-sm font-medium text-gray-700">Género:</label>
                <input type="text" name="genero" id="genero"
                    class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                @error('genero')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="disponible" class="block text-sm font-medium text-gray-700">Disponible:</label>
                <input type="checkbox" name="disponible" id="disponible" value="1"
                    class="form-checkbox mt-1 block" checked> <!-- Marcado por defecto -->
            </div>

            <!-- Otros campos y botones -->

            <div class="flex items-center justify-between mt-6">
                <input type="submit" value="Enviar datos"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
        </form>
    </div>
</div>
@endsection

