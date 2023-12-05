<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller 
{


// Método para mostrar el formulario de creación de préstamo
public function create()
{
    $librosDisponibles = Libro::where('disponible', 1)->get();
    $usuariosDisponibles = User::all(); // Obtener lista de usuarios disponibles

    return view('create_Prestamo', compact('librosDisponibles', 'usuariosDisponibles'));
}


// Método para mostrar el formulario de creación de préstamo del usuario logeado

public function createUsuario()
{
    $librosDisponibles = Libro::where('disponible', 1)->get();
    $user_id = auth()->id(); // Obtiene el ID del usuario autenticado
    return view('create_PrestamoUsuario', compact('librosDisponibles', 'user_id'));
}


public function store(Request $request)
{
    // Valida los datos del formulario (agrega las reglas de validación según tus necesidades)

    $prestamo = new Prestamo();
    $prestamo->user_id = $request->input('user_id');
    $prestamo->book_id = $request->input('book_id');
    $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
    $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
    $prestamo->devuelto = false; // Marcar el préstamo como no devuelto

    $prestamo->save();

    // Actualiza el estado de disponibilidad del libro a 0 (no disponible)
    $libro = Libro::find($request->input('book_id'));
    $libro->disponible = false; // Marcar el libro como no disponible
    $libro->save();

    // Resto de tu lógica para redireccionar o mostrar mensajes

    return redirect()->route('create')->with('success', 'Préstamo creado correctamente');
}


public function storePrestamoUsuario(Request $request)
{
    // Valida los datos del formulario (agrega las reglas de validación según tus necesidades)

    $prestamo = new Prestamo();
    $prestamo->user_id = auth()->id();
    $prestamo->book_id = $request->input('book_id');
    $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
    $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
    $prestamo->devuelto = false; // Marcar el préstamo como no devuelto

    $prestamo->save();

    // Actualiza el estado de disponibilidad del libro a 0 (no disponible)
    $libro = Libro::find($request->input('book_id'));
    $libro->disponible = false; // Marcar el libro como no disponible
    $libro->save();

    // Resto de tu lógica para redireccionar o mostrar mensajes

    return redirect()->route('createUsuario')->with('success', 'Préstamo creado correctamente');
}


public function devolver($id)
{
    $prestamo = Prestamo::find($id);

    if (!$prestamo) {
        return redirect()->route('prestamos.index')->with('error', 'Préstamo no encontrado');
    }

    // Realiza cualquier lógica adicional que necesites para la devolución

    $prestamo->devuelto = true; // Marcar el préstamo como devuelto
    $prestamo->save();

    // Actualiza el estado de disponibilidad del libro a 1 (disponible)
    $libro = Libro::find($prestamo->book_id);
    $libro->disponible = true; // Marcar el libro como disponible
    $libro->save();

    return redirect()->route('prestamos.index')->with('success', 'Préstamo devuelto exitosamente');
}


public function index()
{
    $prestamos = Prestamo::all();

    return view('index', compact('prestamos'));
}


public function indexPrestamosUsuarios()
{
    $user = auth()->user();
    $loans = $user->loans;

    return view('loans.index', compact('loans'));
}




    public function showFormularioAddLibro() {
        $titulo="añadir Libro";
         
        return view("addLibro_Formulario",compact('titulo'));
    }

    // Asegurar de importar el modelo Libro
    
    public function addLibroFormulario(Request $request)
    {
        /* Validación de los datos del formulario*/
        $request->validate([
            'titulo' => 'custom_required|string|max:255',
            'autor' => 'custom_required|string|max:255',
            'año_publicacion' => 'custom_required|integer',
            'genero' => 'custom_required|string|max:255',
            'disponible' => 'custom_required|boolean',
        ]);
    
        // Crear un nuevo libro con los datos del formulario
        $libro = new Libro();
        $libro->titulo = $request->input('titulo');
        $libro->año_publicacion = $request->input('año_publicacion');
        $libro->genero = $request->input('genero');
        $libro->disponible = $request->input('disponible');
        $libro->autor = $request->input('autor');
    
        // Guardar el libro en la base de datos
        $libro->save();
        $id_libro=$libro->id;
        // Redireccionar a la página de detalles del libro recién creado
        return view("addLibro_FormularioOK",['id'=>$id_libro]);
    }
    
    public function showAllPrestamos() {
        $prestamos=Prestamo::allPrestamo();
        return view("mostrarPrestamos")->with('prestamos',$prestamos);
    }
  
    
public function showPrestamo() {
    $prestamos=Prestamo::allPrestamo();
    return view("mostrarPrestamos")->with('prestamos',$prestamos);
}

public function deletePrestamo($id) {
    Prestamo::destroy($id);
    self::showAllPrestamos();
    return redirect('/mostrarPrestamos');
    
}
public function updatePrestamoForm($id) {
    // Obtén el préstamo que deseas editar
    $prestamo = Prestamo::findPrestamoID($id);

    // Obtén la lista de libros disponibles para el select
    $librosDisponibles = Libro::where('disponible', true)->get();

    // Guarda el ID del préstamo en la sesión
    Session::put('id', $id);

    // Pasa ambas variables a la vista
    return view('mostrarDatosPrestamoForm', compact('prestamo', 'librosDisponibles'));
}

public function updatePrestamoFormUsuario($id) {
    // Obtén el préstamo que deseas editar
    $prestamo = Prestamo::findPrestamoID($id);

    // Obtén la lista de libros disponibles para el select
    $librosDisponibles = Libro::where('disponible', true)->get();

    // Guarda el ID del préstamo en la sesión
    Session::put('id', $id);

    // Pasa ambas variables a la vista
    return view('mostrarDatosPrestamoForm', compact('prestamo', 'librosDisponibles'));
}

public function updatePrestamo(Request $request) {
    $id=Session::get('id');
    Prestamo::updatedID($id,$request);
    return redirect('/mostrarPrestamos');
}

public function updatePrestamoUsuario(Request $request) {
    $id=Session::get('id');
    Prestamo::updatedID($id,$request);
    return redirect('/mostrarPrestamosUsuario');
}

public function updateLibro(Request $request) {
    $id=Session::get('id');
    Libro::updatedID($id,$request);
    return redirect('/showLibros');
}



public function mostrarPrestamosConLibros()
{
    // Utiliza Eloquent para obtener los préstamos con información de libro
    $prestamosConLibros = Prestamo::join('libros', 'prestamos.book_id', '=', 'libros.id')
        ->select('prestamos.id','libros.titulo', 'prestamos.user_id', 'prestamos.fecha_prestamo', 'prestamos.fecha_devolucion', 'libros.disponible','prestamos.devuelto')
        ->get();

    // Convierte los campos de fecha a instancias de Carbon si no están vacíos
    foreach ($prestamosConLibros as $item) {
        if (!empty($item->fecha_prestamo)) {
            $item->fecha_prestamo = Carbon::parse($item->fecha_prestamo);
        }

        if (!empty($item->fecha_devolucion)) {
            $item->fecha_devolucion = Carbon::parse($item->fecha_devolucion);
        }
    }

    // Envía los datos a la vista
    return view('mostrarPrestamos', ['prestamosConLibros' => $prestamosConLibros]);
}




public function mostrarPrestamosConLibrosUsuario()
{
    // Obtener el ID del usuario autenticado
    $userId = Auth::id();

    // Utiliza Eloquent para obtener los préstamos con información de libro del usuario
    $prestamosConLibros = Prestamo::join('libros', 'prestamos.book_id', '=', 'libros.id')
        ->where('prestamos.user_id', $userId) // Filtrar por el ID del usuario autenticado
        ->select('prestamos.id', 'libros.titulo', 'prestamos.user_id', 'prestamos.fecha_prestamo', 'prestamos.fecha_devolucion', 'libros.disponible', 'prestamos.devuelto')
        ->get();

    // Convierte los campos de fecha a instancias de Carbon si no están vacíos
    foreach ($prestamosConLibros as $item) {
        if (!empty($item->fecha_prestamo)) {
            $item->fecha_prestamo = Carbon::parse($item->fecha_prestamo);
        }

        if (!empty($item->fecha_devolucion)) {
            $item->fecha_devolucion = Carbon::parse($item->fecha_devolucion);
        }
    }

    // Envía los datos a la vista
    return view('mostrarPrestamosUsuario', ['prestamosConLibros' => $prestamosConLibros]);
}



}
