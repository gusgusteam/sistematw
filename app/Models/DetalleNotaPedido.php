<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleNotaPedido extends Model
{
    use HasFactory;
    protected $table = 'detalle_pedido';
    protected $primaryKey ='id';
    protected $fillable = [
        'cantidad',
        'subTotal',
        'idProductoAlmacen',
        'idPedido',
    ];
    public $timestamps=false;
}
