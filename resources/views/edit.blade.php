@extends('layouts.app')

@section('content')
    <h1>Editar Libro</h1>
    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}">
        <label for="año_publicacion">Año de Publicación:</label>
        <input type="text" id="año_publicacion" name="año_publicacion" value="{{ $libro->año_publicacion }}">
        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero" value="{{ $libro->genero }}">
        <label for="disponible">Disponible:</label>
        <input type="checkbox" id="disponible" name="disponible" value="1" {{ $libro->disponible ? 'checked' : '' }}>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('libros.index') }}">Volver a la Lista de Libros</a>
@endsection
