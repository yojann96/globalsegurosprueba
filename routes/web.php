<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

Route::get('/', function () {
    return view('welcome');
});


//Route::get('RUTA', [controlador::class, 'METODO'] );
Route::get('listarEmpleados', [EmpleadosController::class, 'listarEmpleados'] )->name('listarEmpleados');

Route::get('eloquent', [EmpleadosController::class, 'eloquent'] )->name('eloquent');
Route::get('formularioEmpleado', [EmpleadosController::class, 'formularioEmpleado'] )->name('formularioEmpleado'); // Se pone el ->name('formularioEmpleado'); para que identifique la ruta desde la vista
Route::post('guardarEmpleado', [EmpleadosController::class, 'guardarEmpleado'] )->name('guardarEmpleado'); // Se pone el ->name('guardarEmpleado'); para que identifique la ruta desde la vista

Route::post('listarCiudadesxDepto', [EmpleadosController::class, 'listarCiudadesxDepto'] );
Route::get('eliminarEmpleado/{IdEmpleado}', [EmpleadosController::class, 'eliminarEmpleado'] )->name('eliminarEmpleado');

Route::get('modificarEmpleado/{IdEmpleado}{IdCiudad}', [EmpleadosController::class, 'modificarEmpleado'] )->name('modificarEmpleado');
Route::post('actualizaEmpleado', [EmpleadosController::class, 'actualizaEmpleado'] )->name('actualizaEmpleado');



