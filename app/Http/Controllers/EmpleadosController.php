<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departamentos;
use App\Models\ciudades;
use App\Models\empleados;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{   

    public function listarEmpleados(){
        $empleados = $listarEmpleados = DB::table('empleados AS EM')
            ->join('ciudades AS C', 'EM.idCiudadEmpleado','C.idCiudadEmpleado')
            ->join('departamentos AS D', 'D.idDpartamentoEmpleado','=','C.idDpartamentoEmpleado')
            ->select('EM.IdEmpleado','EM.nombreEmpleado','EM.apellidoEmpleado','EM.nroIdentificacionEmpleado',
                'EM.direccionEmpleado','EM.nrotelefonoEmpleado',
                'D.idDpartamentoEmpleado','D.departamentoEmpleado', 'C.idCiudadEmpleado', 'C.ciudadEmpleado')
            ->get();
        //$listarEmpleados = DB::table('empleados')->get();
        //return count($listarEmpleados);
        //return $empleados;
        return view('Empleado/listarEmpleados', compact('empleados'));
    }

    public function formularioEmpleado(){
        $getDeptos = departamentos::all();
        //return $getDeptos;
        //return view('Empleado/formularioEmpleado');
        return view('Empleado/formularioEmpleado', ['departamentos' => $getDeptos]);
    }

    public function guardarEmpleado(Request $request){
        //return $request->all();
        //dd($request->all());
        //dd($request->nroIdentificacionEmpleado);
        
        //$nombre = trim($request->nombreEmpleado);
        //echo $nombre; die();
        
        //  VALIDAR FORMULARIOS (Información que está llegando a través del Request)
        $this->validate($request,[
            'nombreEmpleado' => 'required|regex:/^[A-Z,a-z, ]+$/', // Aquí describo los campos a validar 
                                           //regex:/^[A-Z],[A-Z,a-z, ]+$/     [A-Z] => Que sólo reciba mayúscula la 1era letra
                                           //regex:/^[A-Z],[A-Z,a-z, ]+$/     [A-Z,a-z, ] => Caracterea desde la A a la Z tanto mayúculas como minúsculas y que reciba espacio
            'apellidoEmpleado' => 'required',
            'nroIdentificacionEmpleado' => 'required|numeric',
            'direccionEmpleado' => 'required',
            'nrotelefonoEmpleado' => 'required|numeric',
            'idDepartamentoEmpleado' => 'required|numeric',
            'idCiudadEmpleado' => 'required|numeric'
            
        ]);
        //echo "Todo Correcto";
        
        //dd($request->all());
        
        //  Crear empleado
        //  Obtener Nro Empleados:        
        $nroEmpleados = empleados::orderBy('IdEmpleado','DESC')
            ->take(1)->get();
        $NuevoId = $nroEmpleados[0]->IdEmpleado + 1;

        //return $NuevoId;

        // Guardar dato
        $empleados = new empleados;
        $empleados->IdEmpleado = $NuevoId;
        $empleados->nombreEmpleado = $request->nombreEmpleado;
        $empleados->apellidoEmpleado = $request->apellidoEmpleado;
        $empleados->nroIdentificacionEmpleado = $request->nroIdentificacionEmpleado;
        $empleados->direccionEmpleado = $request->direccionEmpleado;
        $empleados->nrotelefonoEmpleado = $request->nrotelefonoEmpleado;
        $empleados->idDpartamentoEmpleado = $request->idDepartamentoEmpleado;
        $empleados->idCiudadEmpleado = $request->idCiudadEmpleado;
        $empleados->save();
        return view('Empleado/creadoEmpleado')->with('mensaje', 'Empleado creado éxitosamente!');
    }

    public function eloquent(){
        //return "Operación realizada";

        //  Consultar empleado
        /*
        $empleados = empleados::all();
        return $empleados;

        $empleados = empleados::where('IdEmpleado',2)->get();
        return $empleados;
        */

        //  Actualizar Empleado en específico:
        /*$empleados = empleados::where('IdEmpleado','2')
            ->where('nombreEmpleado','<>','')
            ->update([ 'nombreEmpleado' => 'Juan Felipe' ]);
        return "Modificación realizada";*/

        
    }

    public function listarCiudadesxDepto(Request $request){
        $listarCiudades = ciudades::where('idDpartamentoEmpleado',$request->idDepto)->get();
        return $listarCiudades;
    }

    
    public function eliminarEmpleado($IdEmpleado){
        //  Eliminar registros
        empleados::where('IdEmpleado',$IdEmpleado)->delete();
        return view('Empleado/eliminadoEmpleado')
            ->with('proceso', "BORRAR EMPLEADO")
            ->with('mensaje', 'El empleado fue borrado exitosamente del sistema');

    }

    public function modificarEmpleado($IdEmpleado, $IdCiudad){
        // Obtener información del empleado:
        $infoEmpleado = $empleados = $listarEmpleados = DB::table('empleados AS EM')
            ->where('EM.IdEmpleado',$IdEmpleado)
            ->join('ciudades AS C', 'EM.idCiudadEmpleado','C.idCiudadEmpleado')
            ->join('departamentos AS D', 'D.idDpartamentoEmpleado','=','C.idDpartamentoEmpleado')
            ->select('EM.IdEmpleado','EM.nombreEmpleado','EM.apellidoEmpleado','EM.nroIdentificacionEmpleado',
                'EM.direccionEmpleado','EM.nrotelefonoEmpleado',
                'D.idDpartamentoEmpleado','D.departamentoEmpleado', 'C.idCiudadEmpleado', 'C.ciudadEmpleado')
            ->get();

        //dd($infoEmpleado);
        //return $infoEmpleado[0];

        $getDeptos = departamentos::all();
        $listarCiudades = ciudades::where('idDpartamentoEmpleado',$IdCiudad)->get();

        return view('Empleado/modificarEmpleado')
            ->with('infoEmpleado', $infoEmpleado[0])
            ->with('Deptos', $getDeptos)
            ->with('Ciudades', $listarCiudades); 
    }


    public function actualizaEmpleado(Request $request){
        //return $request;
        $this->validate($request,[
            'nombreEmpleado' => 'required|regex:/^[A-Z,a-z, ]+$/', // Aquí describo los campos a validar 
                                           //regex:/^[A-Z],[A-Z,a-z, ]+$/     [A-Z] => Que sólo reciba mayúscula la 1era letra
                                           //regex:/^[A-Z],[A-Z,a-z, ]+$/     [A-Z,a-z, ] => Caracterea desde la A a la Z tanto mayúculas como minúsculas y que reciba espacio
            'apellidoEmpleado' => 'required',
            'nroIdentificacionEmpleado' => 'required|numeric',
            'direccionEmpleado' => 'required',
            'nrotelefonoEmpleado' => 'required|numeric',
            'idDepartamentoEmpleado' => 'required|numeric',
            'idCiudadEmpleado' => 'required|numeric'
            
        ]);

        empleados::where('IdEmpleado',$request->idEmpleado)
            ->update([ 
                'nombreEmpleado' => $request->nombreEmpleado,
                'apellidoEmpleado' => $request->apellidoEmpleado,
                'nroIdentificacionEmpleado' => $request->nroIdentificacionEmpleado,
                'direccionEmpleado' => $request->direccionEmpleado,
                'nrotelefonoEmpleado' => $request->nrotelefonoEmpleado,
                'idDpartamentoEmpleado' => $request->idDepartamentoEmpleado,
                'idCiudadEmpleado' => $request->idCiudadEmpleado
        ]);

        return view('Empleado/actualizado')
        ->with('proceso',"Modificar datos de usuario")
        ->with('mensaje',"El Empleado $request->nombreEmpleado $request->apellidoEmpleado ha sido modificado exitosamente")
        ->with('error', 1);

    }

}
