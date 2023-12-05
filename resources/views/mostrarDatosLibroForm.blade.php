@extends('app')
@section('title','Editar Libros')
@section('content')
    <div class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 mt-10">
            <h2 class="text-2xl font-semibold mb-4">Editar Libro</h2>

            <form action="{{ route('updateLibro') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título:</label>
                    <input type="text" name="titulo" value="{{ $libro->titulo }}" required
                        class="form-input mt-1 block w-full">
                    @error('titulo')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="autor" class="block text-sm font-medium text-gray-700">Autor:</label>
                    <input type="text" name="autor" value="{{ $libro->autor }}" required
                        class="form-input mt-1 block w-full">
                    @error('autor')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="año_publicacion" class="block text-sm font-medium text-gray-700">Año de Publicación:</label>
                    <input type="text" name="año_publicacion" value="{{ $libro->año_publicacion }}" required
                        class="form-input mt-1 block w-full">
                    @error('año_publicacion')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="genero" class="block text-sm font-medium text-gray-700">Género:</label>
                    <input type="text" name="genero" value="{{ $libro->genero }}" required
                        class="form-input mt-1 block w-full">
                    @error('genero')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="disponible" class="block text-sm font-medium text-gray-700">Disponible: (se modifica desde préstamos automáticamente)</label>
                   
                </div>

                <!-- Otros campos y botones -->

                <div class="flex items-center justify-between mt-6">
                    <input type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </form>
        </div>
    </div>
@endsection
