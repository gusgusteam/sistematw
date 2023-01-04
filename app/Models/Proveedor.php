<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'direccion'
    ];
    public $timestamps = false;
}
