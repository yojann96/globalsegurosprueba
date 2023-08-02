<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    protected $primarykey = 'IdEmpleado';
    protected $fillable =['IdEmpleado','nombreEmpleado','apellidoEmpleado','nroIdentificacionEmpleado',
        'direccionEmpleado','nrotelefonoEmpleado','idDpartamentoEmpleado','idCiudadEmpleado'];
}
