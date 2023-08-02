<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciudades extends Model
{
    use HasFactory;
    protected $primarykey = 'idCiudadEmpleado';
    protected $fillable =['idCiudadEmpleado','ciudadEmpleado','idDpartamentoEmpleado'];
}
