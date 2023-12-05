<nav>
   <div>
      <div>
         <div>
            @if(auth()->check())
               <!-- Verificar el rol del usuario -->
               @if(auth()->user()->rol === 'admin')
               <!-- Menú para administradores -->
               <nav class="bg-blue-500 py-4">
                  <ul class="flex space-x-4 justify-center">
                     <li><a class="text-white hover:bg-blue-700 px-4 py-2 rounded">ADMINISTRADOR</a></li>
                     <li><a href="/dashboard" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Home</a></li>
                     <li><a href="/formAddLibros" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Añadir Libros</a></li>
                     <li><a href="/showLibros" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Mostrar Libros</a></li>
                     <li><a href="prestamos/create" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Añadir Prestamos</a></li>
                     <li><a href="/mostrarPrestamos" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Mostrar Préstamos</a></li>
                  </ul>
               </nav>
               @else
               <!-- Menú para usuarios normales -->
               <nav class="bg-blue-500 py-4">
                  <ul class="flex space-x-4 justify-center">
                     <li><a class="text-white hover:bg-blue-700 px-4 py-2 rounded">USUARIO</a></li>
                     <li><a href="/dashboard" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Home</a></li>
                     <li><a href="/showLibrosUsuario" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Mostrar Libros</a></li>
                     <li><a href="/createUsuario" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Pedir Prestamos</a></li>
                     <li><a href="/mostrarPrestamosUsuario" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Mostrar Préstamos</a></li>
                  </ul>
               </nav>
               @endif
            @endif
         </div>
      </div>
   </div>
</nav>








