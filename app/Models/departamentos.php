<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    use HasFactory;
    protected $primarykey = 'idDpartamentoEmpleado';
    protected $fillable =['idDpartamentoEmpleado','departamentoEmpleado'];
}
