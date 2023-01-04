<?php

namespace App\Http\Livewire;

use App\Models\Calzado;
use App\Models\CalzadoAlmacen;
use App\Models\Cliente;
use App\Models\DetalleNotaVenta;
use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bitacora;

class AgregarVenta extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idCliente = null;
    public $idCalzado = 0;
    public $idAlmacen = null;
    public $arrayCalzados = [];
    public $index;
    public $idUser;
    public $messageErrorCliente;
    public $messageErrorStock;
    public $messageErrorCodigo;

    public $cantidadModal;
    public $precioModal;
    public $estadoCantidadPrecioModal = false;

    public $cantidadSelect;
    public $precioSelect;

    public $cantidad;
    public $precio = null;
    public $message;
    public $total = 0;
    public $subTotal = 0;

    public $stockActual = false;

    public $stock = 0;
    public $estado = "";


    public $criterio = 'calzados';

    public $searchTextCalzadoModal = "";
    public $criterioModal = '';

    public $vP = false;
    public $searchTextCalzado;
    public $searchTextCliente;
    public $mensajeAlmacen = 'Seleccione un Almacen';
    public $final = false;
    public $searchCodigo;

    public function render()
    {
        $searchTextCalzado = '%' . $this->searchTextCalzado . '%';
        $searchTextCliente = '%' . $this->searchTextCliente . '%';
        $idAlmacen = $this->idAlmacen;
        $criterio = $this->criterio;




        $criterioModal = $this->criterioModal;
        $this->estadosSeleccionados($criterioModal);

        $searchTextCalzadoModal = '%'.$this->searchTextCalzadoModal.'%';



        $searchCodigo = $this->searchCodigo;

        $objCalzadoCodigo = $this->buscarCalzadoCodigo($searchCodigo, $idAlmacen);

        $calzado = $this->busquedaImplacable($criterioModal, $searchTextCalzadoModal, $idAlmacen);
        $objBusquedaCalzado = $this->criterioBusqueda($searchTextCalzado, $criterio, $idAlmacen);

        return view('livewire.venta.agregar-venta', [
            'clientes' => Cliente::where('nombre', 'LIKE', '%' . $searchTextCliente . '%')
                ->orWhere('apellidos', 'LIKE', '%' . $searchTextCliente . '%')
                ->paginate(10),
            'calzadoSearch' => $objCalzadoCodigo,
            'calzados' => $calzado,
        ]);
    }

    public function agregarCliente($cliente)
    {
        $this->idCliente = $cliente;
        $this->emitir('success', 'Cliente seleccionado');
    }
    public function emitir($tipo, $message)
    {
        $data = [$tipo, $message];
        $this->emit('message', $data);
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

    public function criterioBusqueda($searchText, $criterio, $idAlamcen)
    {
        switch ($criterio) {
            case 'calzados':
                $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')
                    ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'calzado_almacen.stock'
                    )
                    ->where($criterio . '.descripcion', 'LIKE', '%' . $searchText . '%')
                    ->where('almacenes.id', '=', $idAlamcen)
                    ->orWhere($criterio . '.codigo', '=', $searchText)
                    ->orderBy('calzados.id', 'asc')

                    ->paginate(10);
                return $calzado;
                break;

            case 'categorias':
                $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')

                    ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'calzado_almacen.stock'

                    )
                    ->where('almacenes.id', '=', $idAlamcen)
                    ->where($criterio . '.nombre', 'LIKE', '%' . $searchText . '%')
                    ->orderBy('calzados.id', 'asc')

                    ->paginate(10);
                return $calzado;
                break;
            case 'tipo_calzados':
                $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')
                    ->join('tipo_calzados', 'tipo_calzados.id', '=', 'calzados.idTipoCalzado')
                    ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'calzado_almacen.stock',
                        'tipo_calzados.tipo as tipo',
                    )
                    ->where('almacenes.id', '=', $idAlamcen)
                    ->where($criterio . '.tipo', 'LIKE', '%' . $searchText . '%')
                    ->orderBy('calzados.id', 'asc')

                    ->paginate(10);
                return $calzado;
                break;
            case 'marcas':
                $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')
                    ->join('tipo_calzados', 'tipo_calzados.id', '=', 'calzados.idTipoCalzado')
                    ->join('marca_modelos', 'marca_modelos.id', 'calzados.idMarcaModelo')
                    ->join('marcas', 'marcas.id', '=', 'marca_modelos.idMarca')
                    ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'calzado_almacen.stock',
                        'tipo_calzados.tipo as tipo',
                    )
                    ->where('almacenes.id', '=', $idAlamcen)
                    ->where($criterio . '.nombre', 'LIKE', '%' . $searchText . '%')
                    ->orderBy('calzados.id', 'asc')

                    ->paginate(10);
                return $calzado;
                break;
            default:
                $calzado = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->join('categorias', 'categorias.id', '=', 'calzados.idCategoria')

                    ->select('categorias.nombre as categoria',
                        'calzados.id as idCalzado',
                        'calzados.descripcion',
                        'calzados.imagen',
                        'calzados.codigo',
                        'calzados.precioVenta',
                        'calzados.precioCompra',
                        'almacenes.id as idAlmacen',
                        'almacenes.sigla',
                        'calzado_almacen.id as idCalzadoAlmacen',
                        'calzado_almacen.stock'
                    )
                    ->paginate(10);
                return $calzado;
                break;
        }
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
                'calzado_almacen.id as idCalzadoAlmacen'
            )
            ->where('calzado_almacen.idAlmacen', '=', $idAlmacen)->
            where('codigo', '=', $searchCodigo)->paginate(3);
        return $calzado;
    }
    public function agrgadoCalzadoLista()
    {

        $cantidad = $this->cantidadModal;
        $precio = $this->precioModal;

        $idCalzado = $this->idCalzado;

        $calzado = Calzado::findOrFail($idCalzado);

        if ($this->precioModal == 0) {
            $this->precioModal = $calzado->precioVenta;
        }
        if ($this->cantidadModal == 0) {
            $this->cantidadModal = 1;
        }

        $subTotal = $this->precioModal * $this->cantidadModal;
        $this->total = $this->total + $subTotal;

        array_push($this->arrayCalzados, [
            "idCalzados" => $this->idCalzado,
            "descripcion" => $calzado->descripcion,
            "precioVenta" => $this->precioModal,
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
    public function validarStock($cantidad, $idCalzado, $idAlmacen)
    {
        if (is_null($cantidad)) {
            $this->cantidad = 1;
            $cantidad = $this->cantidad;
        }

        $calzado = CalzadoAlmacen::select('stock')
            ->where('idAlmacen', '=', $idAlmacen)
            ->where('idCalzado', '=', $idCalzado)
            ->get();
        $sw = false;
        $stock = $calzado[0]->stock;
        if ($stock >= $cantidad) {
            $sw = true;
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
                    $calzado = Calzado::findOrFail($this->idCalzado);

                    if (is_null($this->precioSelect)) {
                        $this->precioSelect = $calzado->precioCompra;
                    }
                    if (is_null($this->cantidadSelect)) {
                        $this->cantidadSelect = 1;
                    }
                    if ($this->validarStock($this->cantidadSelect, $this->idCalzado, $this->idAlmacen)) {

                        $subTotal = $this->precioSelect * $this->cantidadSelect;
                        $this->total = $this->total + $subTotal;

                        array_push($this->arrayCalzados, [
                            "idCalzados" => $this->idCalzado,
                            "descripcion" => $calzado->descripcion,
                            "precioVenta" => $this->precioSelect,
                            "cantidad" => $this->cantidadSelect,
                            "subTotal" => $subTotal,
                            "idAlmacen" => $this->idAlmacen,
                        ]);
                        $this->cantidadSelect = null;
                        $this->precioSelect = null;
                        $this->emitir('success', "El Agregado correctamente");

                    } else {
                        $this->emitir('warning', "El Stock es insuficiente");
                    }
                } else {
                    $this->emitir('danger', "El Calzado ya fue seleccionado");
                }

            } else {
                $zapato = CalzadoAlmacen::join('almacenes', 'almacenes.id', '=', 'calzado_almacen.idAlmacen')
                    ->join('calzados', 'calzados.id', '=', 'calzado_almacen.idCalzado')
                    ->where('calzados.codigo', '=', $searchCodigo)
                    ->get();

                $i = count($zapato);
                if ($i > 0) {
                    $this->emitir('warning', 'El producto no esta disponible en este almacen');
                } else {
                    $this->emitir('danger', 'El codigo no es valido');
                }
            }
        } else {
            $this->emitir('danger', 'Ingrese un codigo por favor');
        }
    }

    public function agregarCalzado($idCalzado)
    {

        $this->idCalzado = $idCalzado;
        if (!$this->existe($this->idCalzado)) {
            $this->estadoCantidadPrecioModal = true;
        } else {
            $this->emitir('danger', 'El calzado ya fue asignado');
        }
    }
    public function guardarDetalle($usuario)
    {

        if (!is_null($this->idCliente)) {
            $fecha = date('Y-m-d');

            $this->idUser = $usuario;
            $notaVenta = new Venta();
            $notaVenta->fecha = $fecha;
            $notaVenta->montoTotal = $this->total;
            $notaVenta->idCliente = $this->idCliente;
            $notaVenta->idUser = $usuario;
            $notaVenta->save();
            $bitacora = Bitacora::guardar('nota_venta','guardar',$notaVenta->id);
            $c = count($this->arrayCalzados);

            for ($i = 0; $i < $c; $i++) {

                $idCalzadoAlmacen = $this->buscarIdCalzadoAlmacen(
                    $this->arrayCalzados[$i]['idCalzados'],
                    $this->arrayCalzados[$i]['idAlmacen']
                )->idCalzadoAlmacen;

                $detalleVenta = new DetalleNotaVenta();
                $detalleVenta->cantidad = $this->arrayCalzados[$i]['cantidad'];
                $detalleVenta->subTotal = $this->arrayCalzados[$i]['subTotal'];
                $detalleVenta->idCalzadoAlmacen = $idCalzadoAlmacen;
                $detalleVenta->idNotaVenta = $notaVenta->id;
                $detalleVenta->save();
                $bitacora = Bitacora::guardar('detalle_venta','guardar',$detalleVenta->id);
                $calzadoAlmacen = CalzadoAlmacen::findOrFail($idCalzadoAlmacen);
                $stock = $calzadoAlmacen->stock;
                $calzadoAlmacen->stock = $stock - $this->arrayCalzados[$i]['cantidad'];
                $calzadoAlmacen->update();
                $bitacora = Bitacora::guardar('calzado_almacen','modificar',$calzadoAlmacen->id);

            }
            $this->final = true;
        } else {
            $this->messageErrorCliente = 'El cliente no se ha seleccionado';
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


        $this->total = $this->total - $this->arrayCalzados[$i]["subTotal"];

        if (!is_null($this->precio)) {

            $this->arrayCalzados[$i]['precioVenta'] = $this->precio;
            $this->emitir('success','Precio actualizado correctamente');

        }

        if (!is_null($this->cantidad)) {
            if ($this->validarStock($this->cantidad, $this->arrayCalzados[$i]['idCalzados'], $this->arrayCalzados[$i]['idAlmacen'])) {
                $cantidad = ($this->cantidad);
                $this->arrayCalzados[$i]['cantidad'] = $cantidad;
                $this->cantidad = $cantidad;
                $this->emitir('success','Cantidad actualizada correctamente');

            } else {
                $this->messageErrorStock = "Stock insuficiente";
                $this->emitir('danger','Stock insuficiente');

            }
        }

        $this->arrayCalzados[$i]["subTotal"] = ($this->arrayCalzados[$i]["precioVenta"]) * $this->arrayCalzados[$i]["cantidad"];
        $this->total = $this->total + $this->arrayCalzados[$i]["subTotal"];

        $this->cantidad = null;
        $this->precio = null;

    }
    public function eliminarCalzado($index)
    {
        $this->total = $this->total - $this->arrayCalzados[$index]['subTotal'];
        array_splice($this->arrayCalzados, $index, 1);
        $this->emitir('danger','Eliminado correctamente');
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
