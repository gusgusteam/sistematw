<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Livewire\Component;

class WebCategoria extends Component{

    public $categoria;
    public $searchText;
    public $atributo;
    public $criterio ="productos";
    public $eldy='mensaje';
    public $x= true;
    public $cantidad;
    public $talla;
    public $total =0;

    protected $listeners = [

    ];

    public $idProducto;

    public function render(){
        $criterio = $this->criterio;
        $atributo = "";
        $idCategoria = $this->categoria->id;
        $searchText  = "%".$this->searchText."%";
        if($criterio=='productos'){$this->atributo = 'descripcion';}
        if($criterio=='tipos'){$this->atributo = 'tipo';}
        if($criterio=='marcas'){$this->atributo = 'nombre';}

        $atributo = $this->atributo;

        $producto = Producto::select(
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
        ->where('categorias.id','=',$idCategoria)
        ->where($criterio.'.'.$atributo,'LIKE','%'.$searchText.'%')
        ->get();

        if(!$producto){
            $producto = Producto::select(
                "productos.id as idProducto",
                "productos.descripcion",
                "productos.precioVenta as precio",
                "productos.imagen as img",
                "productos.idMarcaModelo",
                "tipos.tipo",
                "categorias.nombre as categoria",
                "categorias.id as idCategoria",
            )->
            join('tipos','tipos.id','=','productos.idTipo')
            ->join('categorias','categorias.id','=','tipos.idCategoria')
            ->where('categorias.id','=',$idCategoria)
            ->get();
        }


        return view('livewire.web-categoria',[
            'productos' => $producto  ]);
    }
    public function mount($categoria){
        $this->categoria = $categoria;
    }
    public function seleccionarCalzado($id){
        $this->idProducto = $id;
    }

    public function opcion($op){
        if ($op == 1) {
            $this->eldy='login';
        }

        if ($op == 2) {
            $this->eldy='registro';

        }
    }

    public function mostrar(){
        $this->x = true;
    }
    public function ocultar(){
        $this->x = false;
    }

    public function añadirCalzado($idCliente,$idProducto){
        if (!is_null($this->talla) && !is_null($this->cantidad) ) {
            $carrito = Carrito::select('carrito.id')
            ->join('clientes','clientes.id','=','carrito.idCliente')
            ->where('carrito.idCliente','=',$idCliente)->get();

            $idCarrito = $carrito[0]->id;


            $detalle =  new DetalleCarrito();
            $detalle->cantidad = $this->cantidad;
            $detalle->talla = $this->talla;
            $detalle->idProducto = $idProducto;
            $detalle->estado = 0;
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
