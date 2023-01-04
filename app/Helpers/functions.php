<?php


//Configuracion del titulo

use App\Models\Almacen;
use App\Models\Carrito;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\DetalleCarrito;
use App\Models\DetalleNotaCarrito;
use App\Models\DetalleNotaCompra;
use App\Models\DetalleNotaPedido;
use App\Models\DetalleNotaVenta;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoAlmacen;
use App\Models\Proveedor;
use App\Models\Repartidor;
use App\Models\Tipo;
use App\Models\Ubicacion;
use App\Models\User;
use App\Models\Venta;

function titlePage(){
        $head = "Market";
    return $head;
}

// Datos de la empresa
function empresa($dato){
    $res='';
    if($dato =='nombre'){
        $res = 'Market Online';
    }
    if ($dato =='direccion') {
        $res = 'Centro Comercial la Bolivianita Caseta #1, Montero';
    }
    if ($dato == 'telefono') {
        $res = '+591 78538688';
    }
    if ($dato =='email') {
        $res = 'MarketSRL@gmail.com';
    }

    return $res;
}

// Datos del login

function login($dato){
    $res='';
    if($dato =='title'){
        $res = 'Iniciar Sesion';
    }
    if($dato =='placeholder-email'){
        $res = 'Email';
    }
    if($dato =='placeholder-password'){
        $res = '*************************';
    }
    if($dato =='registrar?'){
        $res = 'Registrar una nueva membresía';
    }
    return $res;
}


//Configuracion Pie de Pagina Web
function footer($dato){
    $footer = null;
    $array = [
        "title"       => "Market Online",
        "typeCompany" => "S.A"
    ];
    if($dato == 'title'){
       $footer = $array["title"];
    }
    if($dato == 'typeCompany'){
        $footer = $array["typeCompany"];
    }
    return $footer;
}

function clientes(){
    $clientes = Cliente::all();
    return $clientes;
}

function cliente($idCliente){
    $clientes = Cliente::where('clientes.id','=',$idCliente)->get();
    return $clientes[0];
}

function proveedor($idProveedor){
    $proveedores = Proveedor::where('proveedores.id','=',$idProveedor)->get();
    return $proveedores[0];
}


function proveedores(){
    $proveedores = Proveedor::all();
    return $proveedores;
}

function categorias(){
    $categoria= Categoria::all();
    return $categoria;
}



function tipos(){
    $tipo= Tipo::all();
    return $tipo;
}


function repartidores(){
    $repartidor= Repartidor::all();
    return $repartidor;
}
function repartidor($id){
    $repartidor = Repartidor::findOrFail($id);
    return $repartidor;
}


function almacenes(){
    $almacen= Almacen::all();
    return $almacen;
}

function productos(){
    $productos= Producto::all();
    return $productos;
}

function transferirAlmacenes($idAlmacen){
    $almacenes = Almacen::where('id','!=',$idAlmacen)->get();
    return $almacenes;
}

function buscarCalzadoAlmacenStock($idAlmacen){
    $calzados = ProductoAlmacen::select('calzado_almacen.id',
                'calzado_almacen.stock',
                'calzados.descripcion',
                'calzados.imagen',
                'categorias.nombre as categoria',
                'tipo_calzados.tipo as tipo',
                'marca_modelos.id as idMarcaModelo',
                'marcas.nombre as marca',
                'modelos.nombre as modelo',
                'almacenes.sigla as almacen'
            )
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')
                    ->join('tipo_calzados', 'tipo_calzados.id', '=', 'calzados.idTipoCalzado')
                    ->join('marca_modelos', 'marca_modelos.id', '=', 'calzados.idMarcaModelo')
                    ->join('marcas', 'marcas.id', '=', 'marca_modelos.idMarca')
                    ->join('modelos', 'modelos.id', '=', 'marca_modelos.idModelo')
                    ->join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->where('idAlmacen','=',$idAlmacen)
                    ->orderBy('calzado_almacen.id', 'asc')
                    ->paginate(10);

    return $calzados;
}

function producto($id){
    return Producto::join('tipos','tipos.id','=','productos.idTipo')
    ->join('categorias','categorias.id','=','tipos.idCategoria')
    ->select('categorias.nombre',
            'productos.descripcion',
            'productos.imagen',
            'productos.id',
            'productos.precioVenta',
            'productos.precioCompra',
            'categorias.nombre as categoria',
            'tipos.nombre as tipo',
            )
    ->where('productos.id','=',$id)->first();
}

function categoria($id){
    return Categoria::
    where('categorias.id','=',$id)->get();

}


function tipo($id){
    return Tipo::
    where('tipos.id','=',$id)->first();
}


function usuario($id){
    return User::findOrFail($id);
}


function productoCategoria($id){
    $calzadosCategoria =
    Producto::join('categorias','categorias.id','=','calzados.idCategoria')->
    select('categorias.nombre as categoria')
    ->where('calzados.id','=',$id)->get();
    return $calzadosCategoria[0];
}

function almacen($id){
    $almacen = Almacen::
    where('almacenes.id','=',$id)->get();
    return $almacen[0];
}


function calzadoTipo($idTipo){
    $calzado = Producto::join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
    ->join('categorias','categorias.id','=','calzados.idCategoria')
    ->select('tipo_calzados.id as idTipo ',
             'tipo_calzados.tipo',
            'categorias.nombre as categoria',
             'calzados.id as idCalzado ',
             'calzados.descripcion as calzado'
            )
    ->where('tipo_calzados.id','=',$idTipo)->get();
    return $calzado;
}

function selectCalzado($idAlmacen){
    $calzadoAlmacen =ProductoAlmacen::join('almacenes','almacenes.id','=','calzado_almacen.idAlmacen')
                                    ->join('calzados','calzados.id','=','calzado_almacen.idCalzado')
                                    ->select('almacenes.id as idAlmacen',
                                             'almacenes.sigla',
                                             'calzados.id as idCalzado',
                                             'calzados.descripcion as calzado',
                                             'calzado_almacen.id as idCalzadoAlmacen'
                                    )
                                    ->where('calzado_almacen.idAlmacen','=',$idAlmacen)->get();

    return $calzadoAlmacen;
}


    function buscarCliente($id){
        $cliente = Cliente::findOrFail($id);
        return $cliente;
    }

    function buscarProveedor($id){
        $proveedor = Proveedor::findOrFail($id);
        return $proveedor;
    }

    function buscarRepartidor($id){
        $repartidor = Repartidor::findOrFail($id);
        return $repartidor;
    }

    function notaVenta($id){
        $notaVenta= Venta::findOrFail($id);
        return $notaVenta;
    }

    function detalleVenta($id){
        $detalleVenta= DetalleNotaVenta::where('detalle_venta.idNotaVenta','=',$id)->get();
        return $detalleVenta;

    }

    function detallePedidoCarritoCliente($idCliente){
        $carrito = Carrito::where('idCliente','=',$idCliente)->get();

        $detalleCarrito = DetalleNotaCarrito::
        join('productos','productos.id','=','detallecarrito.idProducto')
        ->where('idCarrito','=',$carrito[0]->id)->get();

        return $detalleCarrito;
    }


    function detallePedidoRepartidor($idPedido){
        $detallePedido = Pedido::join('detalle_pedido','detalle_pedido.idPedido','=','pedido.id')
        ->join('calzado_almacen','calzado_almacen.id','=','detalle_pedido.idCalzadoAlmacen')
        ->join('almacenes','almacenes.id','calzado_almacen.idAlmacen')
        ->join('calzados','calzados.id','calzado_almacen.idCalzado')
        ->where('pedido.id','=',$idPedido)
        ->get();

        return $detallePedido;
    }

    function detallePedido($id){
        $detallePedido= DetalleNotaPedido::where('detalle_Pedido.idPedido','=',$id)->get();
        return $detallePedido;

    }

    function detalleCompra($id){
        $detalleCompra= DetalleNotaCompra::where('detalle_compra.idNotaCompra','=',$id)->get();
        return $detalleCompra;

    }

    function detalleCarrito($idPedido){
        $pedido = Pedido::findOrFail($idPedido);

        $car = Carrito::select(
         'detallecarrito.cantidad',
         'detallecarrito.estado',
         'detallecarrito.idCarrito',
         'detallecarrito.idProducto',
         'productos.descripcion',
         'productos.imagen',
         'productos.precioVenta'
        )
        ->join('detallecarrito','detallecarrito.idCarrito','=','carrito.id')
        ->join('productos','productos.id','=','detallecarrito.idProducto')
        ->join('clientes','clientes.id','=','carrito.idCliente')
        ->where('carrito.idCliente','=',$pedido->idCliente)
        // ->where('detallecarrito.estado','=',1)
        ->get();
        return $car;
    }


    function calzadoAlmacenSeleccionar($idCalzado){
        $calzadoAlmacen = ProductoAlmacen::where('idCalzado','=',$idCalzado)->get();
        return $calzadoAlmacen;
    }

    function operaciones($numero1,$numero2,$operacion){
        $result = 0;
        if ($operacion=='+') {
            $result = $numero1 + $numero2;
        }
        if ($operacion=='*') {
            $result = $numero1 * $numero2;
        }
        return $result;
    }

    function notaPedido($id){
        $notaPedido= Pedido::findOrFail($id);
        return $notaPedido;
    }

    function notaCompra($id){
        $notaCompra= Compra::findOrFail($id);
        return $notaCompra;
    }



    function calzadoAlmacen($id){
        $calzadoAlmacen = ProductoAlmacen::findOrFail($id);
        return $calzadoAlmacen;
    }
    function fechaHoy(){
      return $hoy = date('y-m-d');
    }
    function imagen($id){

    }
    function contarCarrito($id){
        $carrito = Carrito::where("idCliente","=",$id)->get();

        $detalle = DetalleCarrito::where("idCarrito","=",$carrito[0]->id)->get();
        $c = count($detalle);
        return $c;
    }
    function boolRuta($ruta){
        $sw = false;
        if (request()->is($ruta)) {
            $sw = true;
        }
        return $sw;
    }
    function ubicacion($idPedido){
        $pedido = Pedido::findOrFail($idPedido);
        $ubicacion = Ubicacion::findOrFail($pedido->idUbicacion);
        return $ubicacion;
    }
    // function buscarcalzadoAlmacen($idCalzado){
    //     $calzado  = Producto::findOrFail($idCalzado);

    //     $marcaModelo  = MarcaModelo::join('calzados','calzados.idMarcaModelo','=','marca_modelos.id')
    //     ->where('calzados.id','=',$calzado->id)->get();




    //     $calzadoAlmacen  = ProductoAlmacen::join('calzados','calzados.id','=','calzado_almacen.idCalzado')
    //     ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
    //     ->join('categorias','categorias.id','=','calzados.idCategoria')
    //     ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
    //     // ->select('calzados.id as idCalzado',
    //     //          'marca_modelos.id as idMarcaModelo',
    //     //          'calzado_almacen.id as idCalzadoAlmacen'
    //     // )
    //     ->where('categorias.id','=',$calzado->idCategoria)
    //     ->where('tipo_calzados.id','=',$calzado->idTipoCalzado)
    //     ->where('marca_modelos.idMarca','=',$marcaModelo[0]->idMarca)
    //     ->where('calzados.descripcion','LIKE','%'.$calzado->descripcion.'%')->get();
    //     return $calzadoAlmacen;
    // }
    function pedido($id){
        $pedido  = Pedido::findOrFail($id);
        return $pedido;
    }

?>
