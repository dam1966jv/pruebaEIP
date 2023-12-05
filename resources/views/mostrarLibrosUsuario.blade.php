@extends('app')
@section('title', 'Mostrar Libros Usuario')
@section('content')
<div class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Buscar Libros</h1>
    </div>
    <div class="mb-8">
        <form action="{{ route('showAllLibrosTitulo') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <div class="mb-4 w-64">
                <input type="text" name="libro" class="w-full border rounded-lg py-2 px-4 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105 ease-in-out">Buscar por Titulo</button>
        </form>
    </div>
    <div class="mb-8">
        <form action="{{ route('showAllLibrosAutor') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <div class="mb-4 w-64">
                <input type="text" name="autor" class="w-full border rounded-lg py-2 px-4 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105 ease-in-out">Buscar por Autor</button>
        </form>
    </div>
    <div class="mb-8">
        <form action="{{ route('showAllLibrosAño') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <div class="mb-4 w-64">
                <input type="text" name="año_publicacion" class="w-full border rounded-lg py-2 px-4 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105 ease-in-out">Buscar por Año Publicacion</button>
        </form>
    </div>
    <div class="mb-8">
        <form action="{{ route('showAllLibrosAñoIntervalo') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <div class="mb-4 w-64">
                <input type="text" name="año1" class="w-full border rounded-lg py-2 px-4 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring focus:border-blue-300" placeholder="Año 1">
            </div>
            <div class="mb-4 w-64">
                <input type="text" name="año2" class="w-full border rounded-lg py-2 px-4 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring focus:border-blue-300" placeholder="Año 2">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105 ease-in-out">Buscar por Intervalo de Años</button>
        </form>
    
   
    <!-- Botón para ver todos los libros -->
 <!-- Botón para ver todos los libros -->
<div class="text-center">
    <a href="{{ route('showLibrosUsuario') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 transform hover:scale-105 ease-in-out mt-4 no-underline">Ver Todos los Libros</a>
</div>

    @if ($libros->isEmpty())
    <p class="text-center text-gray-700 text-xl">No hay Libros</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Titulo</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Autor</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Año Publicación</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Género</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Disponible</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @each('components.tableUsuario', $libros, 'item')
            </tbody>
        </table>
    </div>
    @endif
@endsection