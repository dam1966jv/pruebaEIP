<!-- admin_menu.blade.php -->
<nav class="bg-blue-500 py-4">
    <ul class="flex space-x-4 justify-center">
        <li><a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Dashboard</a></li>
        <li><a href="{{ route('admin.addBooks') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Añadir Libros</a></li>
        <li><a href="{{ route('admin.showBooks') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Mostrar Libros</a></li>
        <li><a href="{{ route('admin.createLoan') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Añadir Préstamos</a></li>
        <li><a href="{{ route('admin.showLoans') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Mostrar Préstamos</a></li>
    </ul>
</nav>
