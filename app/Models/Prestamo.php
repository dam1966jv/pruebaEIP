<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use HasFactory;  
    
   
    
    public static function updatedID($id, Request $request) {
      $prestamo = Prestamo::find($id);
      
      // Convierte las fechas al formato 'YYYY-MM-DD'
      $fechaPrestamo = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_prestamo')))))->format('Y-m-d');
      $fechaDevolucion = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_devolucion')))))->format('Y-m-d');

      // Actualiza los campos
      $prestamo->fecha_prestamo = $fechaPrestamo;
      $prestamo->fecha_devolucion = $fechaDevolucion;
      $prestamo->devuelto = $request->input('devuelto');
  
      $prestamo->save();
  
    // Obtiene el libro relacionado con el préstamo
// Obtiene el libro relacionado con el préstamo
$libro = $prestamo->libro;

if ($libro) {
    // La relación libro existe y no es null
    // Actualiza el estado de disponibilidad del libro basado en el valor de devuelto
    $libro->disponible = $request->input('devuelto');
    $libro->save();
}
 
      // Resto de la lógica, como redirección o respuesta después de guardar
  }
  
  
  
  
    
  public static function destroy($id)
{
    // Buscar el préstamo por su ID
    $Prestamo = Prestamo::find($id);

    if ($Prestamo) {
        // Obtener el libro relacionado con el préstamo
        $libro = $Prestamo->libro;

        // Verificar si se encontró el préstamo antes de intentar eliminarlo
        $Prestamo->delete();

        // Actualizar el estado de disponibilidad del libro
        if ($libro) {
            $libro->disponible = 1;
            $libro->save();
        }

        // Otras acciones o redirecciones después de eliminar
    } else {
        // Manejar el caso en el que el préstamo no se encontró
        // Por ejemplo, puedes redirigir a una página de error o mostrar un mensaje de error.
    }
}

 
  
    public static function findTitulo($titulo){
       return Libro::where('titulo','=',$titulo)->get();
       //
    }
  
    // En el modelo Prestamo
public function libro()
{
    return $this->belongsTo(Libro::class, 'book_id');
}

public static function allPrestamo()
{
   return Prestamo::all();
   //
}

public static function findPrestamoID($id)
{
   return Prestamo::find($id);
   //
}

// .relación inversa utilizando el método belongsTo:

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}


} 


    
    
    