<?php

namespace App\Http\Livewire;

use App\Models\Bitacora;
use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Compra;
use App\Models\DetalleNotaCompra;
use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class AgregarCompra extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idProveedor;
    public $idCliente = null;
    public $idCalzado = 0;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;

    public $message;

    public $cantidad;
    public $precio;

    public $cantidadModal;
    public $precioModal;
    public $estadoCantidadPrecioModal = false;

    public $cantidadArray;
    public $precioArray;

    public $cantidadSelect;
    public $precioSelect;

    public $criterio = 'calzados';

    public $total = 0;
    public $subTotal = 0;

    public $searchText;
    public $stock;

    public $vP = false;

    public $searchTextCalzadoModal = "";
    public $criterioModal = '';

    public $searchTextProveedor;
    public $searchCodigo;

    public $messageErrorStock;
    public $messageErrorProveedor;
    public $messageErrorCodigo;
    public $stockActual = false;

    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false;

    public $arrayModalCalzado = [];

    public $estado = "";
    public function render()
    {

        $searchCodigo = $this->searchCodigo;
        // $searchTextMo = '%' . $this->searchText . '%';

        $searchTextCalzadoModal = '%' . $this->searchTextCalzadoModal . '%';
        $criterioModal = $this->criterioModal;

        $this->estadosSeleccionados($criterioModal);
        $searchTextProveedor = '%' . $this->searchTextProveedor . '%';
        $idAlmacen = $this->idAlmacen;

        $calzado = $this->busquedaImplacable($criterioModal, $searchTextCalzadoModal, $idAlmacen);

        $objCalzadoCodigo = $this->buscarCalzadoCodigo($searchCodigo, $idAlmacen);

        return view('livewire.compra.agregar-compra', [
            'proveedores' => Proveedor::where('nombre', 'LIKE', '%' . $searchTextProveedor . '%')
                ->orWhere('apellidos', 'LIKE', '%' . $searchTextProveedor . '%')
                ->paginate(3),
            'calzadoSearch' => $objCalzadoCodigo,

            'calzados' => $calzado,

        ]);
    }

    public function estadosSeleccionados($estado)
    {

        if ($estado != $this->estado) {
            $this->searchTextCalzadoModal = "";
            $this->estadoCantidadPrecioModal = false;
        }
        $this->estado = $estado;
    }

    public function busquedaImplacable($criterio, $searchText, $idAlmacen)
    {

        $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
            ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
            ->where('idAlmacen', '=', $idAlmacen)

            ->paginate(10);

        if ($criterio == 'calzados') {
            $calzado = CalzadoAlmacen::
                join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                ->where('calzados.descripcion', 'like', '%' . $searchText . '%')
                ->where('idAlmacen', '=', $idAlmacen)
                ->paginate(10);
        }
        if ($criterio == 'categorias') {
            $calzado = CalzadoAlmacen::
                join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')
                ->where('categorias.nombre', 'like', '%' . $searchText . '%')
                ->where('idAlmacen', '=', $idAlmacen)
                ->paginate(10);
        }
        if ($criterio == 'tipo_calzados') {
            $calzado = CalzadoAlmacen::
                join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                ->join('tipo_Calzados', 'tipo_Calzados.id', '=', 'calzados.idTipoCalzado')
                ->where('tipo_calzados.tipo', 'like', '%' . $searchText . '%')
                ->where('idAlmacen', '=', $idAlmacen)
                ->paginate(10);
        }
        if ($criterio == 'marcas') {
            $calzado = CalzadoAlmacen::
                join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                ->join('marca_modelos', 'marca_modelos.id', '=', 'calzados.idMarcaModelo')
                ->join('marcas', 'marcas.id', '=', 'marca_modelos.idMarca')
                ->join('modelos', 'modelos.id', '=', 'marca_modelos.idModelo')
                ->where('idAlmacen', '=', $idAlmacen)
                ->where('marcas.nombre', 'like', '%' . $searchText . '%')
                ->paginate(10);
        }

        return $calzado;

    }

    public function emitir($tipo, $message)
    {
        $data = [$tipo, $message];
        $this->emit('message', $data);
    }

    public function agregarProveedor($proveedor)
    {
        $this->idProveedor = $proveedor;
        $this->emitir('success', 'Proveedor agregado correctamente');
    }

    public function cargarCalzado()
    {
        // return $array;
    }
    public function buscarCalzadoCodigo($searchCodigo, $idAlmacen)
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
            ->where('almacenes.id', '=', $idAlmacen)->paginate(3);
        return $calzado;
    }

    //LLama al metodo agregar calzado lista despues de anotar la cantidad y precio
    public function agregarCalzado($idCalzado)
    {
        $this->idCalzado = $idCalzado;

        if (!$this->existe($this->idCalzado)) {
            $this->estadoCantidadPrecioModal = true;
        }else{
            $this->emitir('danger', 'El calzado ya fue asignado');
        }

    }

    public function agrgadoCalzadoLista()
    {

            $cantidad = $this->cantidadModal;
            $precio = $this->precioModal;
            $idCalzado = $this->idCalzado;



            $calzado = Calzado::findOrFail($idCalzado);

            if ($this->precioModal == 0) {
                $this->precioModal = $calzado->precioCompra;

            }
            if ($this->cantidadModal == 0) {
                $this->cantidadModal = 1;
            }

            $subTotal = $this->precioModal * $this->cantidadModal;
            $this->total = $this->total + $subTotal;

            array_push($this->arrayCalzados, [
                "idCalzados" => $this->idCalzado,
                "descripcion" => $calzado->descripcion,
                "precioCompra" => $this->precioModal,
                "cantidad" => $this->cantidadModal,
                "subTotal" => $subTotal,
                "idAlmacen" => $this->idAlmacen,
            ]);

            $this->cantidadModal = null;
            $this->precioModal = null;

            $this->estadoCantidadPrecioModal = false;
            $this->emitir('success',"Agregado exitosamente");

    }

    public function existe($idCalzado)
    {
        $c = count($this->arrayCalzados);
        $sw = false;

        for ($i = 0; $i < $c; $i++) {

            if ($this->arrayCalzados[$i]['idCalzados'] == $idCalzado) {
                $sw = true;
            }
        }
        return $sw;
    }
    public function seleccionarCalzado()
    {

        if ($this->searchCodigo) {

            $searchCodigo = $this->searchCodigo;

            $zapato = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                ->where('calzados.codigo', '=', $searchCodigo)
                ->where('almacenes.id', '=', $this->idAlmacen)
                ->get();

            $c = count($zapato);

            if ($c > 0) {
                $this->idCalzado = $zapato[0]->idCalzado;

                if (!$this->existe($this->idCalzado)) {

                    $idCalzado = $this->idCalzado;
                    $calzado = Calzado::findOrFail($idCalzado);

                    if (is_null($this->precioSelect)) {
                        $this->precioSelect = $calzado->precioCompra;
                    }

                    if (is_null($this->cantidadSelect)) {

                        $this->cantidadSelect = 1;
                    }
                    $subTotal = $this->precioSelect * $this->cantidadSelect;
                    $this->total = $this->total + $subTotal;

                    array_push($this->arrayCalzados, [
                        "idCalzados" => $idCalzado,
                        "descripcion" => $calzado->descripcion,
                        "precioCompra" => $this->precioSelect,
                        "cantidad" => $this->cantidadSelect,
                        "subTotal" => $subTotal,
                        "idAlmacen" => $this->idAlmacen,
                    ]);
                    $this->cantidadSelect = null;
                    $this->precioSelect = null;

                } else {
                    $this->emitir('danger', 'El calzado ya fue seleccionado');

                }

            } else {
                $this->emitir('danger', 'El codigo no es valido');
            }
        } else {
            $this->emitir('danger', 'Ingrese un codigo');
        }

    }
    public function guardarDetalle($usuario)
    {
        if ($this->idProveedor) {
            $fecha = date('Y-m-d');
            $this->idUser = $usuario;

            $notaCompra = new Compra();
            $notaCompra->fecha = $fecha;
            $notaCompra->montoTotal = $this->total;
            $notaCompra->idProveedor = $this->idProveedor;
            $notaCompra->idUser = $usuario;
            $notaCompra->save();
            $bitacora = Bitacora::guardar('notaCompra','guardar',$notaCompra->id);

            $c = count($this->arrayCalzados);

            for ($i = 0; $i < $c; $i++) {

                $idCalzadoAlmacen = $this->buscarIdCalzadoAlmacen(
                    $this->arrayCalzados[$i]['idCalzados'],
                    $this->arrayCalzados[$i]['idAlmacen']
                )->idCalzadoAlmacen;

                $detalleCompra = new DetalleNotaCompra();
                $detalleCompra->cantidad = $this->arrayCalzados[$i]['cantidad'];
                $detalleCompra->subTotal = $this->arrayCalzados[$i]['subTotal'];
                $detalleCompra->idCalzadoAlmacen = $idCalzadoAlmacen;
                $detalleCompra->idNotaCompra = $notaCompra->id;
                $detalleCompra->save();
                $bitacora = Bitacora::guardar('detalleCompra','guardar',$detalleCompra->id);


                $calzadoAlmacen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
                $stock = $calzadoAlmacen->stock;
                $calzadoAlmacen->stock = $stock + $this->arrayCalzados[$i]['cantidad'];
                $calzadoAlmacen->update();
                $bitacora = Bitacora::guardar('calzadoAlmacen','modificar',$calzadoAlmacen->id);

            }
            $this->final = true;
        } else {
            $message = "Seleccione un proveedor";
            $this->emit('message', $message);
        }

    }
    public function buscarIdCalzadoAlmacen($idCalzado, $idAlmacen)
    {
        $idCalzadoAlmacen =
        CalzadoAlmacen::select('calzado_almacen.id as idCalzadoAlmacen')->
            join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
            ->join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
            ->where('idAlmacen', '=', $idAlmacen)
            ->where('idCalzado', '=', $idCalzado)
            ->get();
        return $idCalzadoAlmacen[0];
    }

    public function actualizarPrecioStock($i)
    {

        $this->total = $this->total - $this->arrayCalzados[$i]['subTotal'];
        if (!is_null($this->precio)) {
            $this->arrayCalzados[$i]['precioCompra'] = $this->precio;

        }
        if (!is_null($this->cantidad)) {
            $cantidad = ($this->cantidad);
            $this->arrayCalzados[$i]['cantidad'] = $cantidad;
        }
        $this->arrayCalzados[$i]["subTotal"] = ($this->arrayCalzados[$i]["precioCompra"]) * $this->arrayCalzados[$i]["cantidad"];
        $this->total = $this->total + $this->arrayCalzados[$i]['subTotal'];
        $this->cantidad = null;
        $this->precio = null;
        $this->emitir('success','Modificado correctamente');
    }
    public function eliminarCalzado($index)
    {
        $this->total = $this->total - $this->arrayCalzados[$index]['subTotal'];
        array_splice($this->arrayCalzados, $index, 1);
        $this->emitir('danger', 'Eliminado correctamenre');
    }

    public function verProducto($idCalzado)
    {
        $this->vP = true;
        $this->idCalzado = $idCalzado;
    }

    public function verTablaProducto()
    {
        $this->vP = false;

    }

}
