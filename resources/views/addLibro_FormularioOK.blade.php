@extends('app')
@section('title', 'Respuesta Formulario Añadir')
@section('content')
    @if($id > 0)
        <p>Se ha añadido correctamente el libro con ID {{$id}}</p>
    @else
        <p>Ha ocurrido un error al insertar el libro</p>
    @endif
@endsection
