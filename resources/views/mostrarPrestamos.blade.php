@extends('app')
@section('title', 'Mostrar Prestamos')
@section('content')
<div class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Buscar Prestamos</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Título</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Préstamo</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fecha Devolución</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Devuelto</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @each('components.table_prestamos', $prestamosConLibros, 'item')
            </tbody>
        </table>
    </div>
</div>
@endsection
   