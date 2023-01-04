<?php

namespace App\Http\Livewire;

use App\Models\Carrito;
use App\Models\DetalleCarrito;
use App\Models\Producto;
use Livewire\Component;

class WebTipoCalzado extends Component
{
    public $tipo;


    public $searchText;
    public $atributo ="";
    public $criterio ="productos";
    public $eldy='mensaje';
    public $x= true;
    public $cantidad;
    public $total =0;


    public function render(){
        $criterio = $this->criterio;
        $atributo = "";
        $idTipo = $this->tipo->id;
        $searchText = "%".$this->searchText."%";
        if($criterio=='categorias'){$this->atributo = 'nombre';}
        if($criterio=='marcas'){$this->atributo = 'nombre';}
        if($criterio=='productos'){$this->atributo = 'descripcion';}

        
        $atributo = $this->atributo;

        $calzado = Producto::select(
            "productos.id as idProducto",
            "productos.descripcion",
            "productos.precioVenta as precio",
            "productos.imagen as img",
            "tipos.nombre",
            "categorias.nombre as categoria",
            "categorias.id as idCategoria",
        )->
        join('tipos','tipos.id','=','productos.idTipo')
        ->join('categorias','categorias.id','=','tipos.idCategoria')
        ->where('tipos.id','=',$idTipo)
        ->where($criterio.'.'.$atributo,'LIKE','%'.$searchText.'%')
        ->get();

        if(!$calzado){
            $calzado = Producto::select(
                "productos.id as idProducto",
                "productos.descripcion",
                "productos.precioVenta as precio",
                "productos.imagen as img",
                "tipos.nombre",
                "categorias.nombre as categoria",
                "categorias.id as idCategoria",
            )
            ->join('tipos','tipos.id','=','productos.idTipo')
            ->join('categorias','categorias.id','=','tipos.idCategoria')
            ->where('tipos.id','=',$idTipo)
            ->get();    
        }


        return view('livewire.web-tipo-calzado',[
            'productos' => $calzado
        ]);
    }
    
    public function mount($tipo){
        $this->tipo = $tipo;
    }

    public function mostrar(){
        $this->x = true;
    }
    public function ocultar(){
        $this->x = false;
    }

    public function seleccionarCalzado($id){
        $this->idProducto = $id;
    }
    public function buscarCalzado($criterio,$searchText,$idTipo){
        if($criterio=='categorias'){$this->atributo = 'nombre';}
        if($criterio=='marcas'){$this->atributo = 'nombre';}
        if($criterio=='productos'){$this->atributo = 'descripcion';}
        
        $attr = $this->atributo;

        $calzado = Producto::join('tipos','tipos.id','=','productos.idTipo')
        ->join('categorias','categorias.id','=','tipos.idCategoria')
        ->where('tipos.id','=',$idTipo)
        ->where($criterio.'.'.$attr,'LIKE','%'.$searchText.'%')
        ->get();


        return $calzado;
    }
    
    public function añadirCalzado($idCliente,$idProducto){
        if (!is_null($this->cantidad) ) {
            $carrito = Carrito::select('carrito.id')
            ->join('clientes','clientes.id','=','carrito.idCliente')
            ->where('carrito.idCliente','=',$idCliente)->get();

            $idCarrito = $carrito[0]->id;


            $detalle =  new DetalleCarrito();
            $detalle->cantidad = $this->cantidad;
            $detalle->idProducto = $idProducto;
            $detalle->idCarrito = $idCarrito;
            $detalle->save();

            $producto = Producto::findOrFail($detalle->idProducto);
            
            $carrito= Carrito::findOrFail($detalle->idCarrito);
            $carrito->monto = $carrito->monto +  ($detalle->cantidad * $producto->precioVenta);
            $carrito->update();


            $message = "Guardado Exitosamente";
            $this->emit('message',$message);


            $this->emit('actualizarDetalle');
        }else{
            $message = "Complete el campo correctamente";
            $this->emit('message',$message);
        }
        
    }

}
