<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use App\Models\CalzadoAlmacen;
use Livewire\Component;
use Livewire\WithPagination;

class Inventario extends Component
{
    use WithPagination;
    public $searchText;
    public $transferir = false;

    public $idAlmacenDestino;
    public $idAlmacenOrigen;

    public $idCalzadoAlmacen;

    public $siglaOrigen;
    public $siglaDestino;

    public $estadoOrigen =  false;
    public $estadoDestino = false;

    public $arrayAlmacenOrigen = [];
    public $arrayAlmacenDestino = [];

    public $cantidad;
    public $estadoInput = false;
    public $estadoDisponible = false;

    public function render()
    {

        $this->idCalzadoAlmacen ;
        $idAlmacenDestino = $this->idAlmacenDestino;
        $idAlmacenOrigen  = $this->idAlmacenOrigen;

        $this->getAlmacen($idAlmacenDestino,'destino');
        $this->getAlmacen($idAlmacenOrigen,'origen');

        $this->getAlmacenes($idAlmacenOrigen,$idAlmacenDestino);
        $searchText = '%' . $this->searchText . '%';
        $calzadoAlmacen = $this->getCalzadosAlmacenes($searchText);


        if ($this->idCalzadoAlmacen) {
            if ($this->validarStock($this->idCalzadoAlmacen)) {
                $this->estadoDisponible = true;
            } else {
                $this->estadoDisponible = false;
            }
        }

        return view('livewire.almacen.inventario',

            [
                'calzadoAlmacenes' => $calzadoAlmacen,

            ]
        );
    }



    public function getAlmacenes($idOrigen,$id2){
        if ($idOrigen) {

        }else{
            $this->arrayAlmacenDestino = Almacen::get();;
        }
        // if ($idOrigen) {
        //     $almacen = Almacen::where('id','!=',$id1)->get();
        // } else {
        //     $almacen = Almacen::get();
        //     $this->arrayAlmacenDestino;
        // }

    }



    public function getAlmacen($id,$dato){
        if ($id) {

            if ($dato == 'origen') {
                $almacen = Almacen::findOrFail($id);
                $this->siglaOrigen = $almacen->sigla;
                $this->estadoOrigen = true;
            }
            if ($dato == 'destino') {
                $almacen = Almacen::findOrFail($id);
                $this->siglaDestino = $almacen->sigla;
                $this->estadoDestino= true;

            }
        }
    }

    public function getCalzadosAlmacenes($searchText){
        $calzadoAlmacen = CalzadoAlmacen::select('calzado_almacen.id',
        'calzado_almacen.stock',
        'calzados.descripcion as calzado',
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
            ->orWhere('almacenes.sigla', 'LIKE', '%' . $searchText . '%')
            ->orderBy('calzado_almacen.id', 'asc')
            ->paginate(10);
        return $calzadoAlmacen;
    }


    public function verTransferencia(){
        $this->transferir = true;
    }

    public function emitir($tipo, $message)
    {
        $data = [$tipo, $message];
        $this->emit('message', $data);
    }
    public function mostrarInput($idCalzadoAlmacen){
        $this->estadoInput = true;
        $this->idCalzadoAlmacen = $idCalzadoAlmacen;

    }
    public function validarStock($id)
    {
        $sw = false;
        $calzadoAlmacen = CalzadoAlmacen::findOrFail($id);
        if ($calzadoAlmacen->stock >= $this->cantidad) {
            $sw = true;
        }
        return $sw;
    }
    public function transferirCalzado(){

        if ($this->cantidad) {
            if ($this->estadoDisponible) {
                if ($this->cantidad < 0) {
                    $this->emitir('danger',"Cantidad no valida");
                }else{

                    if($this->cantidad == 0 ){
                        $this->emitir('danger',"La Cantidad no puede ser cero");

                    }else{
                        $cantidad = $this->cantidad;
                        $idCalzadoAlmacen = $this->idCalzadoAlmacen;


                        $calzadoAlmacenOrigen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
                        $calzadoAlmacenOrigen->stock = $calzadoAlmacenOrigen->stock - $cantidad;
                        $calzadoAlmacenOrigen->update();







                        $idAlmacenDestino = $this->idAlmacenDestino;
                        $idAlmacenOrigen =  $this->idAlmacenOrigen;


                        $calzadoAlmacenDestino = $this->obtenerCalzadoAlmacen($idAlmacenDestino,$calzadoAlmacenOrigen->idCalzado);

                        if (count($calzadoAlmacenDestino) > 0) {
                           $updateCalzadoAlmacen = CalzadoAlmacen::findOrFail($calzadoAlmacenDestino[0]->id);
                           $updateCalzadoAlmacen->stock = $updateCalzadoAlmacen->stock +  $cantidad;
                           $updateCalzadoAlmacen->update();
                           $this->emitir('success',"Se ha modificado");

                        }else{
                            $newCalzadoAlmacen = new CalzadoAlmacen();
                            $newCalzadoAlmacen->stock = $this->cantidad;
                            $newCalzadoAlmacen->idCalzado = $calzadoAlmacenOrigen->idCalzado;
                            $newCalzadoAlmacen->idAlmacen = $idAlmacenDestino;
                            $newCalzadoAlmacen->save();
                            $this->emitir('success',"Se ha creado");
                        }



                        $this->estadoInput = null;
                        $this->cantidad = null;
                        // $this->idAlmacenDestino = null;
                        // $this->idAlmacenOrigen = null;


                        $this->transferir = true;

                    }
                }

            }else{
                $this->emitir('danger',"Stock Insuficiente");
            }
        } else {
            $this->emitir('warning',"Digite una cantidad por favor");
        }

    }
    public function obtenerCalzadoAlmacen($idAlmacen,$idCalzado){

        $calzadoAlmacenDestino = CalzadoAlmacen::
        where('calzado_almacen.idCalzado','=',$idCalzado)
        ->where('calzado_almacen.idAlmacen','=',$idAlmacen)->get();


        return $calzadoAlmacenDestino;
    }


}
