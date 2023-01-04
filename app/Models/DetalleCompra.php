<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $primaryKey ='id';
    protected $fillable = [
        'cantidad',
        'subTotal',
        'idProductoAlmacen',
        'idNotaCompra',
    ];
    public $timestamps=false;
}
