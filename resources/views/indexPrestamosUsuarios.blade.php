<!-- resources/views/loans/index.blade.php -->
<!-- resources/views/loans/index.blade.php -->


@section('content')
   <div class="container">
       <h1>Tus préstamos</h1>
       @if ($loans)
           <ul>
               @foreach ($loans as $loan)
                   <li>{{ $loan->nombre_del_prestamo }}</li>
                   <!-- Mostrar más detalles del préstamo según tu estructura de datos -->
               @endforeach
           </ul>
       @else
           <p>No tienes préstamos.</p>
       @endif
   </div>
@endsection

