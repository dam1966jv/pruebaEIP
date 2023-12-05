<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LibroController extends Controller 
{
    public function showFormularioAddLibro() {
        $titulo="añadir Libro";
         
        return view("addLibro_Formulario",compact('titulo'));
    }

    // Asegúrate de importar el modelo Libro
    
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
       /* return view("addLibro_Formulario",['id'=>$id_libro]);*/
        return redirect()->route('formAddLibros')->with('success', 'Libro entrado correctamente');
    }


    public function showAllLibrosTitulo(Request $request) {
        $AllLibrosTitulo = Libro::findTitulo($request->input('libro'));
        return view("mostrarLibros")->with('libros',$AllLibrosTitulo);
    }
    
    public function showAllLibrosAutor(Request $request) {
        $AllLibrosAutor = Libro::findAutor($request->input('autor'));
        return view("mostrarLibros")->with('libros',$AllLibrosAutor);
    }

    public function showAllLibrosAño(Request $request) {
        $AllLibrosAño = Libro::findAño($request->input('año_publicacion'));
        return view("mostrarLibros")->with('libros',$AllLibrosAño);
    }

    public function showAllLibrosAñoIntervalo(Request $request) {
        $allLibrosIntervaloAño = Libro::findAñoIntervalo($request->input('año1'),$request->input('año2'));
        return view("mostrarLibros")->with('libros',$allLibrosIntervaloAño);
    }

public function showLibros() {
    $libros=Libro::allLibro();
    return view("mostrarLibros")->with('libros',$libros);
}

public function showAllLibros() {
    $libros=Libro::allLibro();
    return view("mostrarLibros")->with('libros',$libros);
}

public function showAllLibrosUsuario() {
    $libros = Libro::orderBy('disponible', 'desc')->get();
    return view("mostrarLibrosUsuario")->with('libros', $libros);
}
    
public function deleteLibro($id) {
    Libro::destroy($id);
    self::showAllLibros();
    return redirect('/showLibros');
}
public function updateLibroForm($id) {
   
   $libro=Libro::findLibroID($id);

   Session::put('id',$id);
   
   return view('mostrarDatosLibroForm',compact('libro')); 
}
public function updateLibro(Request $request) {
    $id=Session::get('id');
    Libro::updatedID($id,$request);
    return redirect('/showLibros');
}


public function findTitulo(Request $request) {
    try{
        $request->validate(['titulo' =>'required',
        ]);
        $allLibrosTitulo = Libro::findTitulo($request->input('titulo'));
        return response()->json($allLibrosTitulo);
    }
    catch(ValidationException $exception){
        return response()->json(['error'=> $exception->errors()]);
        
    }
   
}


}


