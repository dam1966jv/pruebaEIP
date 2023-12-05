<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id(); // Crea un campo de ID autoincremental
            $table->unsignedBigInteger('user_id'); // Crea un campo de ID de usuario (clave foránea)
            $table->unsignedBigInteger('book_id'); // Crea un campo de ID de libro (clave foránea)
            $table->timestamp('fecha_prestamo'); // Crea un campo de fecha de préstamo
            $table->timestamp('fecha_devolucion')->nullable(); // Crea un campo de fecha de devolución opcional
            $table->boolean('devuelto')->default(false); // Crea un campo booleano para rastrear si el libro está devuelto o no
            $table->timestamps(); // Crea campos para registrar la fecha y hora de creación y actualización de la fila
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos'); // Elimina la tabla 'prestamos' si se revierte la migración
    }
};
