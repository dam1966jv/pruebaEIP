
<tr class="hover:bg-gray-100 border-t border-gray-200">
    <td class="px-4 py-2">{{ $item->user_id }}</td>
    <td class="px-4 py-2">{{ $item->titulo }}</td>
    <td class="px-4 py-2">{{ $item->fecha_prestamo->format('d-m-Y') }}</td>
    <td class="px-4 py-2">{{ $item->fecha_devolucion->format('d-m-Y') }}</td>
    <td class="px-4 py-2">
        @if ($item->devuelto)
            <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full">Devuelto</span>
        @else
            <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full">No Devuelto</span>
        @endif
    </td>
    <td class="px-4 py-2">
        <a href="http://localhost/deletePrestamo/{{ $item->id}}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded-full inline-block mr-2">Borrar</a>
        <a href="http://localhost/updatePrestamoForm/{{ $item->id }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-2 rounded-full inline-block">Modificar</a>
    </td>
</tr>


