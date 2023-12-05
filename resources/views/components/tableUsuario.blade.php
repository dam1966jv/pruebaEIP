<tr class="hover:bg-gray-100 border-t border-gray-200">
    <td class="px-4 py-2">{{$item->titulo}}</td>
    <td class="px-4 py-2">{{$item->autor}}</td>
    <td class="px-4 py-2">{{$item->año_publicacion}}</td>
    <td class="px-4 py-2">{{$item->genero}}</td>
    <td class="px-4 py-2">
        @if ($item->disponible)
            <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full">Disponible</span>
        @else
            <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full">No Disponible</span>
        @endif
    </td>
</tr>

