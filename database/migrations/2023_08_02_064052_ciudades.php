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
        Schema::create('ciudades',function(Blueprint $table){
            $table->increments('idCiudadEmpleado');
            $table->string('ciudadEmpleado',40);
            
            $table->integer('idDpartamentoEmpleado')->unsigned();
            $table->foreign('idDpartamentoEmpleado')->references('idDpartamentoEmpleado')->on('departamentos');
            
            
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
        Schema::drop('ciudades');
    }
};
