<!-- resources/views/libros/index.blade.php -->

@extends('app')
@section('title', 'Mostrar Libros')

@section('content')
    <h1>Lista de Libros</h1>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de Publicación</th>
                <th>Género</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->año_publicacion }}</td>
                    <td>{{ $libro->genero }}</td>
                    <td>{{ $libro->disponible ? 'Sí' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



