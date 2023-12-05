@extends('app')

@section('content')
<div class="flex items-center justify-center mt-10">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 mt-10">
        <h2 class="text-2xl font-semibold mb-4">Crear Préstamo</h2>

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

        <form method="POST" action="{{ route('storePrestamoUsuario') }}">
            @csrf

             <!-- Campo para seleccionar el libro -->
            <div class="mb-4">
                <label for="book_id" class="block text-sm font-medium text-gray-700">Selecciona un Libro:</label>
                <select class="form-select mt-1 block w-full" id="book_id" name="book_id" required>
                    @foreach($librosDisponibles as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para la fecha de préstamo (automáticamente establecida en la fecha actual) -->
            <div class="mb-4">
                <label for="fecha_prestamo" class="block text-sm font-medium text-gray-700">Fecha de Préstamo:</label>
                <input type="date" class="form-input mt-1 block w-full" id="fecha_prestamo" name="fecha_prestamo"
                    value="{{ now()->toDateString() }}" readonly>
            </div>

            <!-- Campo para la fecha de devolución (automáticamente establecida en 30 días más tarde) -->
            <div class="mb-4">
                <label for="fecha_devolucion" class="block text-sm font-medium text-gray-700">Fecha de Devolución:</label>
                <input type="date" class="form-input mt-1 block w-full" id="fecha_devolucion" name="fecha_devolucion"
                    value="{{ now()->addDays(30)->toDateString() }}" readonly>
            </div>

            <!-- Otros campos del formulario  -->

            <div class="flex items-center justify-center mt-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300">
                    Crear Préstamo
                </button>
            </div>

           
        </form>
    </div>
</div>
@endsection

