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
        //
        Schema::create('empleados',function(Blueprint $table){
            $table->increments('IdEmpleado');
            $table->string('nombreEmpleado',40);
            $table->string('apellidoEmpleado',40);
            $table->string('nroIdentificacionEmpleado',15);
            $table->string('direccionEmpleado',40);
            $table->string('nrotelefonoEmpleado',15);
            
            $table->integer('idDpartamentoEmpleado')->unsigned();
            $table->foreign('idDpartamentoEmpleado')->references('idDpartamentoEmpleado')->on('departamentos');

            $table->integer('idCiudadEmpleado')->unsigned();
            $table->foreign('idCiudadEmpleado')->references('idCiudadEmpleado')->on('ciudades');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('empleados');
    }
};
