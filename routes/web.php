<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Models\Prestamo;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes/web.php

Route::get('/', function () {
    return view('home');
});


//proteccion rutas para administradores

Route::group(['middleware' => ['auth', 'checkUserRole:admin']], function () {
    

Route::get('/formAddLibros', [LibroController::class,'showFormularioAddLibro'])->name('formAddLibros');
Route::post('/addLibro', [LibroController::class,'addLibroFormulario'])->name('addLibro');
Route::get('/deleteLibro/{id}', [LibroController::class,'deleteLibro'])->name('deleteLibro');
Route::get('/updateLibroForm/{id}', [LibroController::class,'updateLibroForm'])->name('updateLibroForm');
Route::post('/updateLibro', [LibroController::class,'updateLibro'])->name('updateLibro');
Route::get('/showPrestamos', [PrestamoController::class,'showAllPrestamos']);
Route::get('/formAddPrestamos', [PrestamoController::class,'showFormularioAddPrestamo']);
Route::post('/addPrestamo', [PrestamoController::class,'addPrestamoFormulario'])->name('addPrestamo');
Route::get('/deletePrestamo/{id}', [PrestamoController::class,'deletePrestamo']);
Route::get('/updatePrestamoForm/{id}', [PrestamoController::class,'updatePrestamoForm'])->name('updatePrestamoForm');
Route::post('/updatePrestamo', [PrestamoController::class,'updatePrestamo'])->name('updatePrestamo');
Route::get('/mostrarPrestamos', [PrestamoController::class, 'mostrarPrestamosConLibros'])->name('mostrarPrestamosConLibros');
Route::get('/prestamos/create', [PrestamoController::class, 'create'])->name('create');
Route::post('/prestamos', [PrestamoController::class, 'store'])->name('store');
Route::get('/prestamos', [PrestamoController::class, 'index'])->name('index');

});

 // Rutas o vistas para usuarios comunes

Route::group(['middleware' => ['auth', 'checkUserRole:usuario']], function () {
   
Route::get('/showLibrosUsuario', [LibroController::class,'showAllLibrosUsuario'])->name('showLibrosUsuario');
Route::get('/createUsuario', [PrestamoController::class, 'createUsuario'])->name('createUsuario');
Route::post('/prestamosUsuario', [PrestamoController::class, 'storePrestamoUsuario'])->name('storePrestamoUsuario');
Route::get('/mostrarPrestamosUsuario', [PrestamoController::class, 'mostrarPrestamosConLibrosUsuario'])->name('mostrarPrestamosConLibrosUsuario');
Route::get('/updatePrestamoFormUsuario/{id}', [PrestamoController::class,'updatePrestamoFormUsuario'])->name('updatePrestamoFormUsuario');
Route::post('/updatePrestamoUsuario', [PrestamoController::class,'updatePrestamoUsuario'])->name('updatePrestamoUsuario');


});

Route::post('/showAllLibrosTitulo', [LibroController::class,'showAllLibrosTitulo'])->name('showAllLibrosTitulo');
Route::post('/showAllLibrosAutor', [LibroController::class,'showAllLibrosAutor'])->name('showAllLibrosAutor');
Route::post('/showAllLibrosAño', [LibroController::class,'showAllLibrosAño'])->name('showAllLibrosAño');
Route::post('/showAllLibrosAñoIntervalo', [LibroController::class,'showAllLibrosAñoIntervalo'])->name('showAllLibrosAñoIntervalo');
Route::get('/showLibros', [LibroController::class,'showAllLibros'])->name('showLibros');
Route::get('/showLibros', [LibroController::class,'showAllLibros'])->name('showLibros');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');









