<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bitacora;

use function PHPUnit\Framework\isNull;

class AgregarInventarios extends Component{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $idCalzado;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;
    public $criterio ;
    public $message;
    public $errorCodigo;
    public $errorExiste;


    public $searchCodigo;
    public $codigo;

    public $estado = "";

    public $idCalzadoSeleccionado;
    public $idAlmacenSeleccionado;

    public $cantidadSelect;
    public $precioCompraSelect;
    public $precioVentaSelect;

    public $cantidadModal;
    public $precioCompraModal;
    public $precioVentaModal;



    public $estadoCantidadPrecioModal = false;
    public $searchTextCalzadoModal = "";
    public $criterioModal = '';
// Almacen
    public $sigla;


    public $cantidad    ;

    public $stock  ;
    public $precioVenta  ;
    public $precioCompra ;


    public $vP = false;
    public $searchText;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false ;

    public function render(){
       $criterio  = $this->criterio;
        $searchText = '%'.$this->searchText.'%';
        $searchCodigo = $this->searchCodigo;


        $searchTextCalzadoModal = '%' . $this->searchTextCalzadoModal . '%';
        $criterioModal = $this->criterioModal;
        $this->estadosSeleccionados($criterioModal);
        $idAlmacen = $this->idAlmacen;

        $objCalzadoCodigo = $this->buscarCalzadoCodigo($searchCodigo);

        $objCalzado = Almacen::criterioBusqueda($criterio,$searchText);
        $calzado = $this->busquedaImplacable($criterioModal, $searchTextCalzadoModal);


        return view('livewire.almacen.agregar-inventarios',
            [
                'calzados' => $calzado,
                'calzadoSearch' => $objCalzadoCodigo,
            ]
        );
    }

    public function emitir($tipo, $message)
    {
        $data = [$tipo, $message];
        $this->emit('message', $data);
    }
    public function buscarCalzadoCodigo($searchCodigo)
    {
        $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
            ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
            ->select('almacenes.id as idAlmacen',
                'almacenes.sigla',
                'calzados.id as idCalzado',
                'calzados.descripcion as calzado',
                'calzados.precioVenta',
                'calzados.imagen',
                'calzado_almacen.id as idCalzadoAlmacen',
                'calzado_almacen.stock',
            )
            ->where('codigo', '=', $searchCodigo)
            ->paginate(3);
        return $calzado;
    }

    public function agrgadoCalzadoLista()
    {
        $idCalzado = $this->idCalzado;


        $calzado = Calzado::findOrFail($idCalzado);

        if (is_null($this->precioVentaModal)) {
            $this->precioVentaModal = $calzado->precioVenta;

        }
        if (is_null($this->precioCompraModal)) {
            $this->precioCompraModal = $calzado->precioCompra;
        }
        if (is_null($this->cantidadModal)) {
            $this->cantidadModal = 1;
        }

        $cantidad = $this->cantidadModal;



        array_push($this->arrayCalzados,[
            "idCalzados"        => $this->idCalzado,
            "codigo"            => $calzado->codigo,
            "nombre"            => $calzado->descripcion,
            "precioVenta"       => $this->precioVentaModal,
            "precioCompra"      => $this->precioCompraModal,
            "cantidad"          => $cantidad,
            "idAlmacen"         => $this->idAlmacen
        ]);
        $this->cantidadModal = null;
        $this->precioCompraModal = null;
        $this->precioVentaModal = null;

        $this->estadoCantidadPrecioModal = false;
        $this->emitir('success',"Agregado correctamente");

    }
    public function busquedaImplacable($criterio, $searchText)
    {

        $calzado = Calzado::
        select('calzados.id as idCalzado','descripcion','codigo','imagen')
            // join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
            // ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
            ->paginate(10);

        if ($criterio == 'calzados') {
            $calzado = Calzado::
                select('calzados.id as idCalzado','descripcion','codigo','imagen')
                ->where('calzados.descripcion', 'like', '%' . $searchText . '%')

                ->paginate(10);
        }
        if ($criterio == 'categorias') {
            $calzado = Calzado::
                select('calzados.id as idCalzado','descripcion','codigo','imagen')
                ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')
                ->where('categorias.nombre', 'like', '%' . $searchText . '%')

                ->paginate(10);
        }
        if ($criterio == 'tipo_calzados') {
            $calzado = Calzado::
                select('calzados.id as idCalzado','descripcion','codigo','imagen')
                ->join('tipo_Calzados', 'tipo_Calzados.id', '=', 'calzados.idTipoCalzado')
                ->where('tipo_calzados.tipo', 'like', '%' . $searchText . '%')

                ->paginate(10);
        }
        if ($criterio == 'marcas') {
            $calzado = Calzado::
                select('calzados.id as idCalzado','descripcion','codigo','imagen')
                ->join('marca_modelos', 'marca_modelos.id', '=', 'calzados.idMarcaModelo')
                ->join('marcas', 'marcas.id', '=', 'marca_modelos.idMarca')
                ->join('modelos', 'modelos.id', '=', 'marca_modelos.idModelo')
                ->where('marcas.nombre', 'like', '%' . $searchText . '%')
                ->paginate(10);
        }

        return $calzado;

    }

    public function mount(){
        $this->errorExiste ='';
    }

    public function estadosSeleccionados($estado)
    {

        if ($estado != $this->estado) {
            $this->searchTextCalzadoModal = "";
            $this->estadoCantidadPrecioModal = false;
        }
        $this->estado = $estado;
    }

    public function resetError(){
        $this->errorExiste = '';
    }
    public function agregarCalzado($idCalzado){
        $this->idCalzadoSeleccionado = $idCalzado;

        $this->idCalzado = $idCalzado;

        if (!$this->existe($this->idCalzado)) {
            $this->estadoCantidadPrecioModal = true;
        }else{
            $this->emitir('danger', 'El calzado ya fue asignado');
        }
    }
    public function agregarAlmacen($idAlmacen){
        $this->idAlmacen = $idAlmacen;
    }
    public function verProducto($idCalzado){
        $this->vP = true;
        $this->idCalzado = $idCalzado;
    }
    public function verTablaProducto(){
        $this->vP = false;

    }
    public function existe($idCalzado){
        $c = count($this->arrayCalzados);
        $sw = false;

        for ($i=0; $i < $c; $i++) {
            if($this->arrayCalzados[$i]['idCalzados']==$idCalzado && $this->idAlmacen == $this->arrayCalzados[$i]['idAlmacen']){
                $sw = true;
            }
        }
        return $sw;
    }

    public function seleccionarCalzado(){



        if($this->searchCodigo){

            $searchCodigo = $this->searchCodigo;
            $zapato = Calzado::where('codigo','=',$searchCodigo)->get();

            $c = count($zapato);
            if ($c > 0){
                $this->idCalzado = $zapato[0]->id;
                if (!$this->existe($this->idCalzado)) {
                    $calzado = Calzado::findOrFail($this->idCalzado);


                    if (is_null($this->precioCompraSelect)) {
                        $this->precioCompraSelect = $calzado->precioCompra;
                    }
                    if (is_null($this->precioVentaSelect)) {
                        $this->precioVentaSelect = $calzado->precioVenta;
                    }
                    if (is_null($this->cantidadSelect)) {
                        $this->cantidadSelect = 1;
                    }



                    array_push($this->arrayCalzados,[
                        "idCalzados"        => $calzado->id,
                        "nombre"            => $calzado->descripcion,
                        "codigo"            => $calzado->codigo,
                        "precioVenta"       => $this->precioVentaSelect,
                        "precioCompra"      => $this->precioCompraSelect,
                        "cantidad"          => $this->cantidadSelect,
                        "idAlmacen"         => $this->idAlmacen
                    ]);

                    $this->cantidadSelect = null;
                    $this->precioCompraSelect = null;
                    $this->precioVentaSelect = null;

                    $this->emitir('success', "Agregado exitosamente");

                } else {
                    $this->emitir('danger', "El Calzado ya fue seleccionado");
                }
            }else{
                $this->emitir('danger','El codigo no es valido');
            }
        }else{
            $this->emitir('danger','Ingrese un codigo');

        }

    }
    public function guardarInventario(){
        $c = count($this->arrayCalzados);

        for ($i=0; $i < $c; $i++) {

            if ($this->existeCalzado($this->arrayCalzados[$i]['idCalzados'],$this->arrayCalzados[$i]['idAlmacen'])) {
                $idCalzadoAlmacen = $this->obtenerCalzadoAlmacen($this->arrayCalzados[$i]['idCalzados'],$this->arrayCalzados[$i]['idAlmacen']);

                $objCalzadoAlmacen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
                $objCalzadoAlmacen->stock = $objCalzadoAlmacen->stock + $this->arrayCalzados[$i]['cantidad'];
                $objCalzadoAlmacen->update();
                $bitacora = Bitacora::guardar('calzado_almacen','modificar',$calzadoAlmacen->id);

            }else{
                $calzadoAlmacen = new CalzadoAlmacen();
                $calzadoAlmacen->idCalzado = $this->arrayCalzados[$i]['idCalzados'] ;
                $calzadoAlmacen->idAlmacen = $this->arrayCalzados[$i]['idAlmacen'] ;
                $calzadoAlmacen->stock     = $this->arrayCalzados[$i]['cantidad'] ;
                $calzadoAlmacen->save();
                $bitacora=Bitacora::guardar('calzado_almacen','guardar',$calzadoAlmacen->id);
            }
        }
        $this->final = true;
    }
    public function existeCalzado($idCalzado,$idAlmacen){
        $sw = 0;
        $existe = CalzadoAlmacen::where('idAlmacen','=',$idAlmacen)
                                 ->where('idCalzado','=',$idCalzado)
                                 ->get();
        if (count($existe)) {
            $sw = 1;
        }
        return $sw;
    }
    public function obtenerCalzadoAlmacen($idCalzado,$idAlmacen){
        $calzadoAlmacen = CalzadoAlmacen::where('idAlmacen','=',$idAlmacen)
        ->where('idCalzado','=',$idCalzado)
        ->get();

        return $calzadoAlmacen[0]->id;
    }
    public function crearAlmacen(){

        $almacen = new Almacen();
        $almacen->sigla = $this->sigla;
        $almacen->save();
        $bitacora = Bitacora::guardar('categoria','guardar',$categoria->id);
    }

    public function actualizarPrecioStock($i){


        if (!is_null($this->cantidad)) {

            $this->arrayCalzados[$i]['cantidad'] = $this->cantidad;
            $this->emitir('success','la cantidad se ha actualizado correctamente');

        }
        if (!is_null($this->precioVenta)) {

            $this->arrayCalzados[$i]['precioVenta'] = $this->precioVenta;
            $this->emitir('success','Precio de venta actualizado correctamente');

        }
        if (!is_null($this->precioCompra)) {

            $this->arrayCalzados[$i]['precioCompra'] = $this->precioCompra;
            $this->emitir('success','Precio de compra actualizado correctamente');

        }

        $this->cantidad   = null;
        $this->precioVenta = null;
        $this->precioCompra = null;
    }
    public function eliminarCalzado($index){
        array_splice($this->arrayCalzados,$index,1);
        $this->emitir('danger','Eliminado correctamente');
    }

}
