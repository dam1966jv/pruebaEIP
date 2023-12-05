@extends('app')
@section('title', 'Editar Prestamo')
@section('content')
<div class="flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 mt-10">
        <h2 class="text-2xl font-semibold mb-4">Editar Prestamo</h2>

        <form action="{{ route('updatePrestamoUsuario') }}" method="POST">
            @csrf

            <!-- Campo "Fecha de Préstamo" -->
            <div class="mb-4">
                <label for="fecha_prestamo" class="block text-sm font-medium text-gray-700">Fecha de Préstamo:</label>
                @php
                    $fechaPrestamo = date('d/m/Y', strtotime($prestamo->fecha_prestamo));
                @endphp
                <input type="text" name="fecha_prestamo" value="{{ $fechaPrestamo }}" required
                    class="form-input mt-1 block w-full">
                @error('fecha_prestamo')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo "Fecha de Devolución" -->
            <div class="mb-4">
                <label for="fecha_devolucion" class="block text-sm font-medium text-gray-700">Fecha de Devolución:</label>
                @php
                    $fechaDevolucion = date('d/m/Y', strtotime($prestamo->fecha_devolucion));
                @endphp
                <input type="text" name="fecha_devolucion" value="{{ $fechaDevolucion }}" required
                    class="form-input mt-1 block w-full">
                @error('fecha_devolucion')
                <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo "Devuelto" -->
            <div class="mb-4">
                <label for="devuelto" class="block text-sm font-medium text-gray-700">Devuelto:</label>
                <select name="devuelto" required class="form-select mt-1 block w-full">
                    <option value="0" {{ !$prestamo->devuelto ? 'selected' : '' }}>No Devuelto</option>
                    <option value="1" {{ $prestamo->devuelto ? 'selected' : '' }}>Devuelto</option>
                </select>
            </div>

            

            <!-- Mostrar el título del libro -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Título del Libro:</label>
                <input type="text" value="{{ $prestamo->libro->titulo }}" class="form-input mt-1 block w-full" disabled>
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



