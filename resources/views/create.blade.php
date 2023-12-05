@extends('app')

@section('content')
    <h1>Añadir Nuevo Libro</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo">
        <label for="año_publicacion">Año de Publicación:</label>
        <input type="text" id="año_publicacion" name="año_publicacion">
        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero">
        <label for="disponible">Disponible:</label>
        <input type="checkbox" id="disponible" name="disponible" value="1">
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('index') }}">Volver a la Lista de Libros</a>
@endsection
