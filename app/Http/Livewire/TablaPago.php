<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use App\Models\Carrito;
use App\Models\DetalleNotaCarrito;
use App\Models\Producto;
use Livewire\Component;

class TablaPago extends Component
{
    public $idCliente;
    public $total;


    public function render()
    {
        $carrito = Carrito::join('clientes','clientes.id','carrito.idCliente')
        ->join('detallecarrito','detallecarrito.idCarrito','carrito.id')
        ->where("clientes.id","=",$this->idCliente)
        ->get();


        $carrito1 = Carrito::join('clientes','clientes.id','carrito.idCliente')
        ->where("clientes.id","=",$this->idCliente)->get();
        $this->total = $carrito1[0]->monto;

        return view('livewire.tabla-pago',[
            'carrito'=> $carrito
        ]);
    }

    public function mount($idCliente){
        $this->idCliente=$idCliente;
        $this->total = $this->sumarTotal();
    }

    public function sumarTotal(){
        $carrito = Carrito::where('idCliente','=',$this->idCliente)->get();
        $idCarrito = $carrito[0]->id; 

        $r = 0;
        $detalleCarrito= DetalleNotaCarrito::
        where('detallecarrito.idCarrito','=',$idCarrito)
        ->get();

        foreach ($detalleCarrito as $key => $value) {
            $producto = Producto::findOrFail($value->idProducto);
            $sub = $producto->precioVenta *  $value->cantidad;
            $r = $r +  $sub; 
        }
        return $r;
    }


}
