<div class="bg-blue-500 text-white p-2">
    @auth
        <span class="mr-4">Bienvenido, {{ auth()->user()->name }}</span>
        <a href="{{ route('profile.show') }}" class="text-blue-200 hover:text-blue-300 mr-4">Mi perfil</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-red-200 hover:text-red-300">Cerrar sesión</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <a href="{{ route('login') }}" class="text-blue-200 hover:text-blue-300 mr-4">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="text-blue-200 hover:text-blue-300">Registrarse</a>
    @endauth
</div>

