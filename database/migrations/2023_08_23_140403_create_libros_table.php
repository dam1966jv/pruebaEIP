<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('año_publicacion');
            $table->string('genero');
            $table->boolean('disponible');
            $table->timestamps(); // Esto agregará automáticamente los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
