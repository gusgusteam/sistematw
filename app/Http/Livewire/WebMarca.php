<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Livewire\Component;

class WebMarca extends Component
{
    public $marca;
    public $searchText;
    public $atributo ="";
    public $criterio ="calzados";
    public $eldy='mensaje';
    public $x= true;
    public $cantidad;
    public $talla;
    public $total =0;

    

    public function render(){
        $criterio = $this->criterio;
        $atributo = "";
        $idMarca = $this->marca->id;
        $searchText = "%".$this->searchText."%";
        if($criterio=='calzados'){$this->atributo = 'descripcion';}
        if($criterio=='categorias'){$this->atributo = 'nombre';}
        if($criterio=='tipo_calzados'){$this->atributo = 'tipo';}

        $atributo = $this->atributo;

        $calzado = Calzado::select(
            "calzados.id as idCalzado",
            "calzados.descripcion",
            "calzados.precioVenta as precio",
            "calzados.imagen as img",
            "calzados.idMarcaModelo",
            "tipo_calzados.tipo",
            "categorias.nombre as categoria",
            "marcas.nombre as marca",
            "marcas.id as idMarca",
            "categorias.id as idCategoria",
            "modelos.nombre as modelo",
            "modelos.id as idModelo",
        )
        ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
        ->join('categorias','categorias.id','=','calzados.idCategoria')
        ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
        ->join('marcas','marcas.id','=','marca_modelos.idMarca')
        ->join('modelos','modelos.id','=','marca_modelos.idModelo')
        ->where('marcas.id','=',$idMarca)
        ->where($criterio.'.'.$atributo,'LIKE','%'.$searchText.'%')
        ->get();

        if(!$calzado){
            $calzado = Calzado::select(
                "calzados.id as idCalzado",
                "calzados.descripcion",
                "calzados.precioVenta as precio",
                "calzados.imagen as img",
                "calzados.idMarcaModelo",
                "tipo_calzados.tipo",
                "categorias.nombre as categoria",
                "marcas.nombre as marca",
                "marcas.id as idMarca",
                "categorias.id as idCategoria",
                "modelos.nombre as modelo",
                "modelos.id as idModelo",
            )
            ->join('tipo_calzados','tipo_calzados.id','=','calzados.idTipoCalzado')
            ->join('categorias','categorias.id','=','calzados.idCategoria')
            ->join('marca_modelos','marca_modelos.id','=','calzados.idMarcaModelo')
            ->join('marcas','marcas.id','=','marca_modelos.idMarca')
            ->join('modelos','modelos.id','=','marca_modelos.idModelo')
            ->where('marcas.id','=',$idMarca)
            ->get();    
        }


        return view('livewire.web-marca',[
            'calzados' => $calzado  ]);
    }
    public function mount($marca){
        $this->marca = $marca;
    }
    public function mostrar(){
        $this->x = true;
    }
    public function ocultar(){
        $this->x = false;
    }
    public function seleccionarCalzado($id){
        $this->idCalzado = $id;
    }
    public function añadirCalzado($idCliente,$idCalzado){
        if (!is_null($this->talla) && !is_null($this->cantidad) ) {
            $carrito = Carrito::select('carrito.id')
            ->join('clientes','clientes.id','=','carrito.idCliente')
            ->where('carrito.idCliente','=',$idCliente)->get();

            $idCarrito = $carrito[0]->id;


            $detalle =  new DetalleCarrito();
            $detalle->cantidad = $this->cantidad;
            $detalle->talla = $this->talla;
            $detalle->idCalzado = $idCalzado;
            $detalle->idCarrito = $idCarrito;
            $detalle->save();

            $calzado = Calzado::findOrFail($detalle->idCalzado);
            
            $carrito= Carrito::findOrFail($detalle->idCarrito);
            $carrito->monto = $carrito->monto +  ($detalle->cantidad * $calzado->precioVenta);
            $carrito->update();


            $message = "Guardado Exitosamente";
            $this->emit('message',$message);


            $this->emit('actualizarDetalle');
        }else{
            $message = "Complete el campo correctamente";
            $this->emit('message',$message);
        }
        
    }
    public function opcion($op){
        if ($op == 1) {
            $this->eldy='login';
        }

        if ($op == 2) {
            $this->eldy='registro';
            
        }
    }

}
