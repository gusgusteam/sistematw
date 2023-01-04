<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Compra;


class DetalleCompra extends Component
{
    public $searchText;
    public $criterio;
    public function render()
    {
        $searchText = null;
        if ($this->criterio == 'fecha') {
            $searchText = $this->searchText;
        }
        if ($this->criterio == 'proveedor') {
            $searchText = '%' . $this->searchText . '%';
        }

        $compras = $this->filtrar($this->criterio, $searchText);
        return view(
            'livewire.compra.detalle-compra',
            [
                'compras' => $compras
            ]
        );
    }
    public function filtrar($criterio, $searchText)
    {
        $consulta = Compra::join('users', 'users.id', '=', 'nota_compra.idUser')
        ->join('proveedores', 'proveedores.id', '=', 'nota_compra.idProveedor')
        ->select(
            'nota_compra.id',
            'proveedores.nombre',
            'proveedores.apellidos',
            'nota_compra.fecha',
            'nota_compra.montoTotal',
            'nota_compra.idProveedor',
            'nota_compra.idUser',
        )->paginate(10);
        if ($criterio == 'proveedor') {
            $consulta=Compra::join('users', 'users.id', '=', 'nota_compra.idUser')
                ->join('proveedores', 'proveedores.id', '=', 'nota_compra.idProveedor')
                ->select(
                    'nota_compra.id',
                    'proveedores.nombre',
                    'proveedores.apellidos',
                    'nota_compra.fecha',
                    'nota_compra.montoTotal',
                    'nota_compra.idProveedor',
                    'nota_compra.idUser',
                )
                ->where('proveedores.nombre', 'LIKE', '%' . $searchText . '%')
                ->paginate(10);
        }
        if ($criterio == 'fecha') {
            $consulta=Compra::join('users', 'users.id', '=', 'nota_compra.idUser')
                ->join('proveedores', 'proveedores.id', '=', 'nota_compra.idProveedor')
                ->select(
                    'nota_compra.id',
                    'proveedores.nombre',
                    'proveedores.apellidos',
                    'nota_compra.fecha',
                    'nota_compra.montoTotal',
                    'nota_compra.idProveedor',
                    'nota_compra.idUser',
                )
                ->where('nota_compra.fecha', '=', $searchText)
                ->paginate(10);
        }
        return $consulta;
    }
}
