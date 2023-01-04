<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Carrito;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\DetalleNotaCarrito;
use App\Models\DetalleNotaCompra;
use App\Models\DetalleNotaVenta;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generarPDFCompra(Request $request){

        $notaCompra = Compra::findOrFail($request->id);
        $proveedor = Proveedor::findOrFail($notaCompra->idProveedor);
        $detalle = DetalleNotaCompra::where('idNotaCompra','=',$notaCompra->id)->get();

        // $calzadoAlmacen =  CalzadoAlmacen::findOrFail($detalle->calzadoAlmacen);
        // $calzado =  Calzado::findOrFail($calzadoAlmacen->idCalzado);

        // 'cantidad',
        // 'subTotal',
        // 'idCalzadoAlmacen',
        // 'idNotaCompra',

        // $orden = ordenAtencion::findOrFail($id);
        // $idCliente = $orden->idCliente;
        // //{}

        // $cliente = cliente::findOrFail($idCliente);


        // $detalle =  detalleOrden::join('producto','producto.id','detalleorden.idProducto')
        // ->where('detalleorden.idOrdenAtencion','=',$id)->get();

        $data = [
                     "detalle"     => $detalle,
                     "proveedor"   => $proveedor,
                     "notaCompra"  => $notaCompra,

                ];


        // $data = "Hola";
        $pdf = PDF::loadView('pdf.compra',$data);

        return $pdf->download('pdfCompras.pdf');
    }


    public function generarPDFVenta(Request $request){

        $notaCompra = Venta::findOrFail($request->id);
        $proveedor = Cliente::findOrFail($notaCompra->idCliente);
        $detalle = DetalleNotaVenta::where('idNotaVenta','=',$notaCompra->id)->get();

        // $calzadoAlmacen =  CalzadoAlmacen::findOrFail($detalle->calzadoAlmacen);
        // $calzado =  Calzado::findOrFail($calzadoAlmacen->idCalzado);

        // 'cantidad',
        // 'subTotal',
        // 'idCalzadoAlmacen',
        // 'idNotaCompra',

        // $orden = ordenAtencion::findOrFail($id);
        // $idCliente = $orden->idCliente;
        // //{}

        // $cliente = cliente::findOrFail($idCliente);


        // $detalle =  detalleOrden::join('producto','producto.id','detalleorden.idProducto')
        // ->where('detalleorden.idOrdenAtencion','=',$id)->get();

        $data = [
                     "detalle"     => $detalle,
                     "proveedor"   => $proveedor,
                     "notaCompra"  => $notaCompra,

                ];


        // $data = "Hola";
        $pdf = PDF::loadView('pdf.venta',$data);

        return $pdf->download('pdfVentas.pdf');
    }

    public function generarPDFPedido(Request $request){

        $pedido = Pedido::findOrFail($request->id);
        $cliente = Cliente::findOrFail($pedido->idCliente);


        $carrito = Carrito::where('idCliente','=',$pedido->idCliente)->get();


        $detalle = DetalleNotaCarrito::where('idCarrito','=',$carrito[0]->id)->get();

        $data = [
                     "detalle"     => $detalle,
                     "cliente"   => $cliente,
                     "carrito"  => $carrito,
                     "pedido"  => $pedido,

                ];


        $pdf = PDF::loadView('pdf.pedido',$data);

        return $pdf->download('pdfPedido.pdf');
    }
}
