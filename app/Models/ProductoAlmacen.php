<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoAlmacen extends Model
{
    use HasFactory;

    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'producto_almacen';

    protected $fillable = [
        'stock',
        'idProducto',
        'idAlmacen'
    ];
    public $timestamps =false;


    static function criterioBusqueda($searchText,$criterio, $idAlmacen){

        switch ($criterio) {
            case 'productos':
                $producto = ProductoAlmacen::join('almacenes','almacenes.id','=','producto_almacen.idAlmacen')
                ->join('productos','productos.id','=','producto_almacen.idProducto')
                ->join('tipos','tipos.id','=','productos.tipo_id')
                ->join('categorias','categorias.id','=','tipos.idCategoria')
                ->join('subcategorias','subcategorias.id','=','categorias.subcategoria')
                ->select('categorias.nombre as categoria',
                        'productos.descripcion',
                        'productos.codigo',
                        'productos.precioVenta',
                        'productos.precioCompra',
                        'productos.imagen',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'producto_almacen.id as idProductoAlmacen',
                        'producto_almacen.stock',
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
                ->orWhere($criterio.'.codigo','=',$searchText)
                ->paginate(10);
                return $producto;
                break;

            case 'categorias':
                $producto = ProductoAlmacen::join('almacenes','almacenes.id','=','producto_almacen.idAlmacen')
                ->join('productos','productos.id','=','producto_almacen.idProducto')
                ->join('tipos','tipos.id','=','productos.tipo_id')
                ->join('categorias','categorias.id','=','tipos.idCategoria')
                ->join('subcategorias','subcategorias.id','=','categorias.idSubCategoria')
                ->select('categorias.nombre as categoria',
                        'productos.descripcion',
                        'productos.codigo',
                        'productos.precioVenta',
                        'productos.precioCompra',
                        'productos.imagen',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'producto_almacen.id as idProductoAlmacen',
                        'producto_almacen.stock',
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.descripcion','LIKE','%'.$searchText.'%')
                ->orWhere($criterio.'.nombre','=',$searchText)
                ->paginate(10);
                
                return $producto;
                break;
            case 'tipos':
                $producto = ProductoAlmacen::join('almacenes','almacenes.id','=','producto_almacen.idAlmacen')
                ->join('productos','productos.id','=','producto_almacen.idProducto')
                ->join('tipos','tipos.id','=','productos.idTipo')
                ->join('categorias','categorias.id','=','tipos.idCategoria')
                ->select('categorias.nombre as categoria',
                        'productos.id as idProducto',
                        'productos.descripcion',
                        'productos.imagen',
                        'productos.codigo',
                        'productos.precioVenta',
                        'productos.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'producto_almacen.id as idProductoAlmacen',
                        'producto_almacen.stock',
                        'tipos.nombre as tipo'
                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->where($criterio.'.nombre','LIKE','%'.$searchText.'%')
                ->paginate(10);
                return $producto;
                break;
            default:
                $producto = ProductoAlmacen::join('almacenes','almacenes.id','=','producto_almacen.idAlmacen')
                ->join('productos','productos.id','=','producto_almacen.idProducto')
                ->join('tipos','tipos.id','=','productos.idTipo')
                ->join('categorias','categorias.id','=','tipos.idCategoria')

                ->select('categorias.nombre as categoria',
                        'productos.id as idProducto',
                        'productos.descripcion',
                        'productos.imagen',
                        'productos.codigo',
                        'productos.precioVenta',
                        'productos.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'producto_almacen.id as idProductoAlmacen',
                        'producto_almacen.stock'

                        )
                ->where('almacenes.id','=',$idAlmacen)
                ->paginate(10);

                return $producto;
                break;
        }
    }

}
