<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id(); // Clave primaria autoincremental
        $table->string('tipodoc');
        $table->integer('docusu');
        $table->string('nombre');
        $table->string('apellido');
        $table->timestamp('fnacimiento');
        $table->string('ciudadNacimiento');
        $table->string('email')->unique(); // Email único
        $table->string('contrasena');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
