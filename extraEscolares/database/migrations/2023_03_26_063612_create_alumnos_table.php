<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alumno');
            $table->integer('numero_control');
            $table->integer('telefono');
            $table->unsignedBigInteger('id_carrera');
            $table->date('fecha_nacimiento');
            $table->string('escuela_anterior');
            $table->date('fecha_ingreso');
            $table->integer('horaCivica')->nullable()->default(0);
            $table->integer('horaDeportiva')->nullable()->default(0);
            $table->integer('horaCultural')->nullable()->default(0);
            $table->string('ubicacionFisicaCultural')->nullable();
            $table->string('ubicacionFisicaDeportiva')->nullable();
            $table->string('ubicacionFisicaCivica')->nullable();
            $table->string('eventoTallerCivico')->nullable();
            $table->string('eventoTallerDeportiva')->nullable();
            $table->string('eventoTallerCultural')->nullable();
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
        Schema::dropIfExists('alumnos');
    }
}
