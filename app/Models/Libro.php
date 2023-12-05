<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Libro extends Model
{
    use HasFactory;
    public static function create(Request $request)
{
    $libro = new Libro();
   $libro->titulo = $request->input('titulo');
   $libro->año_publicacion = $request->input('año_publicacion');
   $libro->genero = $request->input('genero');
   $libro->disponible = $request->input('disponible');
   $libro->save();
   return $libro->id;
}


public static function updatedID($id, Request $request) {
        $libro = Libro::find($id);
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->año_publicacion = $request->input('año_publicacion');
        $libro->genero = $request->input('genero');
        $libro->save();

}

public static function destroy($ids)
{
    $libro= Libro :: find($ids);
    $libro->delete();
   //
}
public static function allLibro()
{
   return Libro::all();
   //
}
public static function findLibroID($id)
{
   return Libro::find($id);
   //
}
public static function findTitulo($titulo){
   return Libro::where('titulo','=',$titulo)->get();
   //
}
public static function findAutor($autor){
   return Libro::where('autor','=',$autor)->get();
   //
}
public static function findAño($año_publicacion){
   return Libro::where('año_publicacion','=',$año_publicacion)->get();
   //
}

public static function findAñoIntervalo($año1,$año2){
   return Libro::where('año_publicacion','>=',$año1)->where('año_publicacion','<=',$año2)->get();
   //
}



// En el modelo Libro
public function libro()
{
    return $this->hasMany(Prestamo::class, 'book_id');
}


    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'book_id');
    }
}




