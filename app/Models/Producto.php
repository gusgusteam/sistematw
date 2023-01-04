<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'productos';

    protected $fillable = [
        'descripcion',
        'codigo',
        'precioVenta',
        'precioCompra',
        'imagen',
        'idTipo'
    ];
    public $timestamps = false;



    
}
