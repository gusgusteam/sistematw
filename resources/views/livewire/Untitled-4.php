<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\DetalleNotaCarrito;
use App\Models\DetalleNotaPedido;
use App\Models\Pedido;
use App\Models\Repartidor;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bitacora;
use App\Models\ProductoAlmacen;
use App\Models\Tipo;

class Delivery extends Component
{

    // public $carritoDetalleSeleccionado;
    use WithPagination;


    public $searchText;



    public $carritoSeleccionado;
    public $pedidoSeleccionado;
    public $clienteSeleccionado;
    public $productoSeleccionado;
    public $almacenSeleccionado;



    public $pedidoDetalleSeleccionado;



    public $opcionAlmacen = false;
    public $opcionRepartidor =  false;


    public $cantidad = 0;
    public $refPedido;



    public $idCliente;
    public $idCarrito;
    public $idPedido;
    public $idProducto;
    public $idAlmacen;

    public $idProductoAlmacen;
    public $idDetalleCarrito;
    public $idDetallePedido;
    public $arrayProducto;



    public $opcion = false;



    public function render(){


        $searchText = '%'.$this->searchText.'%';
        $pedidos = $this->coleccionPedidos($searchText);
        $repartidores = $this->coleccionRepartidores();

        $idProducto = $this->idProducto;


        $arrayCarritoDetalleSeleccionado = [];
        $arrayProductoAlmacen = [];


        if($this->idCarrito){
            $arrayCarritoDetalleSeleccionado = $this->coleccionCarritoDetalleSeleccionado($this->idCarrito);
        }

        if ($idProducto) {
            $arrayProductoAlmacen = Producto::
            join('producto_almacen','producto_almacen.idProducto','=','productos.id')
            ->join('almacenes','producto_almacen.idAlmacen','=','almacenes.id')
            ->where('productos.id','=',$idProducto)->get();
        }



        return view('livewire.delivery',[
            'repartidores' => $repartidores ,
            'pedidos' => $pedidos,
            'carritoDetalleSeleccionado'=>$arrayCarritoDetalleSeleccionado,
            'productoAlmacen' => $arrayProductoAlmacen
        ]);
    }
    public function coleccionPedidos($searchText){
        $pedidos =Pedido::join('clientes','clientes.id','=','pedido.idCliente')
            ->select(
                "pedido.id",
                "pedido.fecha",
                "pedido.fechaentrega",
                "pedido.hora",
                "pedido.horaentrega",
                "pedido.tiempoentrega",
                "pedido.montoTotal",
                "pedido.estado",
                "pedido.idUbicacion",
                "pedido.idRepartidor",
                "pedido.idCliente",
            )
            ->orderBy('pedido.id','desc')
            ->where('clientes.nombre','LIKE','%'.$searchText.'%')
            ->paginate(10);

        return $pedidos;
    }

    public function coleccionRepartidores(){
        $repartidores = Repartidor::paginate(10);
        return $repartidores;
    }

    //Para seleccionar el repartido que entregara el pedido
    public function seleccionarRepartidor($idPedido,$idRepartidor){

        $pedido = Pedido::findOrFail($idPedido);
        $pedido->idRepartidor = $idRepartidor;
        $pedido->update();
        $bitacora = Bitacora::guardar('pedido','modificar',$pedido->id);

        $this->emitir('success','Repartidor seleccionado');
    }


    public function coleccionCarritoDetalleSeleccionado($id){
        $carritoDetalleSeleccionado = Carrito::select(
            'productos.id as idProducto',
            'productos.descripcion',
            'productos.codigo',
            'productos.precioVenta',
            'productos.precioCompra',
            'productos.imagen',
            'productos.idTipo',
            'detallecarrito.cantidad',
            'detallecarrito.estado as estadoDetalle',
            'detallecarrito.idCarrito',
            'detallecarrito.refPedido',
            'detallecarrito.id as idDetalleCarrito',
            'carrito.estado as estadoCarrito',
            'carrito.monto',
            'carrito.id',
        )
        ->join('detallecarrito','detallecarrito.idCarrito','=','carrito.id')
        ->join('productos','detallecarrito.idProducto','=','productos.id')
        ->where('carrito.id','=',$id)
        ->get();

        return $carritoDetalleSeleccionado;
    }



    public function coleccionPedidoSolicitado($id){
        $pedidoDetalleSeleccionado = Pedido::
        join('detalle_pedido','detalle_pedido.idPedido','=','pedido.id')
        ->where('pedido.id','=',$id)
        ->where('pedido.estado','=',0)
        ->get();

        return  $pedidoDetalleSeleccionado;
    }

    public function carritoSeleccionado($idCliente){
        $carritoSeleccionado = Carrito::where('idCliente','=',$idCliente)->get();
        return $carritoSeleccionado[0];
    }




    public function atenderCalzadoAlmacen($idProducto,$cantidad,$idDetalleCarrito,$refPedido){
        $this->opcionAlmacen = true;
        $this->idProducto =  $idProducto;
        $this->cantidad = $cantidad;
        $this->refPedido = $refPedido;
        $this->idDetalleCarrito = $idDetalleCarrito;
        $this->emitir('success',"Seleccione de que almacen desea obtener el producto $idDetalleCarrito");
    }
    public function atenderPedido($idPedido,$idCliente){
        //Pedido Cliente Carrito

        $this->clienteSeleccionado = Cliente::findOrFail($idCliente);
        $this->pedidoSeleccionado = Pedido::findOrFail($idPedido);
        $this->carritoSeleccionado = $this->carritoSeleccionado($idCliente);

        // $this->pedidoDetalleSeleccionado = $this->pedidoSolicitado($idPedido);
        $this->idCliente = $idCliente;
        $this->idCarrito = $this->carritoSeleccionado->id;
        $this->idPedido = $idPedido;

        $this->opcion = true;
        $this->emitir('success','Selecciona el producto de los almacenes');
    }
    public function verListaPedido(){
        $this->opcion = false;
    }
    public function buscarCalzado($idProducto,$cantidad){
        $this->cantidad = $cantidad;

        $producto  = Producto::findOrFail($idProducto);
        $tipo = Tipo::findOrFail($producto->idTipo); 


        $productoAlmacen  = ProductoAlmacen::join('productos','productos.id','=','producto_almacen.idProducto')
        ->join('tipos','tipos.id','=','productos.idTipo')
        ->join('categorias','categorias.id','=','tipos.idCategoria')
        ->select('productos.id as idProducto',
                 'producto_almacen.idAlmacen as idAlmacen',
                 'producto_almacen.id as idProductoAlmacen',
                 'producto_almacen.stock',
        )
        ->where('categorias.id','=',$tipo->idCategoria)
        ->where('tipos.id','=',$producto->idTipo)
        ->where('productos.descripcion','LIKE','%'.$producto->descripcion.'%')->get();
        $this->arrayCalzado = $productoAlmacen;
    }
    public function venderCalzado($idProductoAlmacen){
        $productoAlmacen = ProductoAlmacen::findOrFail($idProductoAlmacen);
        $productoAlmacen->stock = $productoAlmacen->stock - $this->cantidad;
        $productoAlmacen->update();
        Bitacora::guardar('producto_almacen','modificar',$productoAlmacen->id);

        $message = "Producto seleccionado";
        $this->emit('message',$message);
    }

    public function emitir($tipo,$message){
        $data = [$tipo, $message];
        $this->emit('message', $data);
    }

    //Para los productos solicitados
    public function verCalzadosSolicitados(){
        $this->opcionAlmacen = false;
    }

    //Para obtener el calzado almacen
    public function getProductoAlmacen($idProducto,$idAlmacen){
        $productoAlmacen = ProductoAlmacen::
        where('idProducto','=',$idProducto)
        ->where('idAlmacen','=',$idAlmacen)->get();

        return $productoAlmacen[0];
    }

    public function updateStockCalzadoAlmacen($cantidad,$idProductoAlmacen){
        $productoAlmacen = ProductoAlmacen::FindOrFail($idProductoAlmacen);
        $productoAlmacen->stock = $productoAlmacen->stock - $cantidad;
        $productoAlmacen->update();
        $bitacora = Bitacora::guardar('producto_almacen','modificar',$productoAlmacen->id);
    }




    //Para modificar el estado de detalle carrito
    public function updateEstadoDetalleCarrito(){
        $detalleCarrito = DetalleNotaCarrito::findOrFail($this->idDetalleCarrito);
        $detalleCarrito->estado = 2;
        $detalleCarrito->update();
        $bitacora = Bitacora::guardar('detallecarrito','modificar',$detalleCarrito->id);
    }
    public function functionExisteCalzadoSinAtender(){
        $sw = false;
        $idCliente = $this->idCliente;
        $carrito = $this->carritoSeleccionado($idCliente);
        $detalleCarrito = DetalleNotaCarrito::where('idCarrito','=',$carrito->id)
        ->get();


        foreach ($detalleCarrito as $key => $carrito) {
            if ($carrito->estado == 1) {
                $sw = true;
            }
        }

        return $sw;

    }

    public function updateDetallePedidoIdCalzadoAlmacen($refPedido,$idProductoAlmacen){
        $detallePedido = DetalleNotaPedido::findOrFail($refPedido);
        $detallePedido->idProductoAlmacen = $idProductoAlmacen;
        $detallePedido->update();
        $bitacora = Bitacora::guardar('detalle_pedido','modificar',$detallePedido->id);
    }

    //Para que solicite el pedido
    public function obtenerCalzadoDelAlmacen($idProducto,$idAlmacen,$stock){
        $cantidad = $this->cantidad;
        $refPedido = $this->refPedido;

        if(!$this->functionExisteCalzadoSinAtender()){
            $pedido = Pedido::findOrFail($this->idPedido);
            $pedido->estado= 1;
            $pedido->update();
            $bitacora = Bitacora::guardar('pedido','modificar',$pedido->id);
        }
        if($stock > $cantidad){

            $this->updateEstadoDetalleCarrito();
            $productoAlmacen = $this->getProductoAlmacen($idProducto,$idAlmacen);
            $this->updateStockCalzadoAlmacen($cantidad,$productoAlmacen->id);
            $this->updateDetallePedidoIdCalzadoAlmacen($refPedido,$productoAlmacen->id);

            $this->emitir('success',"El Producto a sido seleccionado");
            $this->opcionAlmacen = false;
        }else{
            $this->emitir('danger','El Stock es insuficiente');
        }
    }
}
