@if ($pedido->estado == 3)
<button type="button"  class="btn btn-info btn-sm btn-block">No disponible</button>
@else
<a href="{{ route('pdf.pedidos', ['id'=> $pedido->id]) }}" class="btn btn-sm btn-warning">
    <i class="fas fa-file"></i>
</a>
<a target="_blank" href="{{@ubicacion($pedido->id)->url}}" class="btn btn-sm btn-success">
    <i class="fas fa-location-arrow"></i>
</a>

<button wire:click='atenderPedido({{$pedido->id}},{{$pedido->idCliente}})' type="button" class="btn btn-secondary btn-sm">
    <i class="fas fa-shopping-cart"></i>
</button>

@if (is_null($pedido->idRepartidor))
    <button type="button" class="btn style-warning btn-warning btn-sm" data-toggle="modal" data-target="#modal-seleccionar-repartidor{{ $pedido->id }}">
        <i class="fas fa-plus"></i>
    </button>
    <div wire:ignore.self class="modal fade" class="modal fade" id="modal-seleccionar-repartidor{{ $pedido->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header style-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Repartidores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                        <h3 style="font-size: 16px; font-weight: 400">Seleccione un repartidor</h3>

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="style-warning">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Opcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($repartidores as $repartidor)
                                                <tr>
                                                    <td>{{ $repartidor->id }}</td>
                                                    <td>{{ $repartidor->nombre }}</td>
                                                    <td>{{ $repartidor->apellidos }}</td>
                                                    <td>
                                                        <button wire:click='seleccionarRepartidor({{$pedido->id}},{{$repartidor->id}})' type="button" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn style-warning btn-warning btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        </div>
@else
    <!-- Button trigger modal -->
    <button type="button" class="btn style-primary btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
    <i class="fa fa-user-circle" aria-hidden="true"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header style-primary">
                    <h5 class="modal-title">Repartidor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Nombre : {{repartidor($pedido->idRepartidor)->nombre}}<br>
                    Apellidos : {{repartidor($pedido->idRepartidor)->apellidos}}<br>
                    Licencia : {{repartidor($pedido->idRepartidor)->numeroLicencia}}<br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endif

<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detalle-pedido-modal{{ $pedido->id }}">
    <i class="fas fa-eye"></i>
</button>

<div wire:ignore.self class="modal fade" class="modal fade" id="detalle-pedido-modal{{ $pedido->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header style-info">
                <h5 class="modal-title" id="exampleModalLabel">Detalle pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="row">
                            <div class="col-6">
                                <h6><span style="font-weight: 900; padding-right: 5px ">Cliente:</span>   {{ @cliente(@pedido($pedido->id)->idCliente)->nombre }} {{ @cliente(@pedido($pedido->id)->idCliente)->apellidos }}</h6>
                            </div>
                            <div class="text-right col-6">
                                <h6><span style="font-weight: 900; padding-right: 5px ">Fecha:</span>    {{@pedido($pedido->id)->fecha}} </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="style-info">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Talla</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@detalleCarrito($pedido->id) as $p)
                                        <tr>
                                        {{-- <td>{{ $p->id }}</td> --}}
                                        <td>{{ $p->descripcion}}</td>
                                        <td>{{ $p->precioVenta}}</td>
                                        <td>{{ $p->talla }}</td>
                                        <td>{{ $p->cantidad }}</td>
                                        <td>{{ operaciones($p->precioVenta,$p->cantidad,'*')}} </td>
                                        <td>
                                            @if ($p->estado==1)
                                                <span class="badge badge-info">Solicitado</span>
                                            @endif
                                            @if ($p->estado==2)
                                                    <span class="badge badge-info">Seleccionado</span>
                                            @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5"> TOTAL : </td>
                                    <td> Bs / {{@pedido($pedido->id)->montototal}}  </td>
                                </tr>
                                </tfoot>
                            </table>
                            <div style="color: red" role="alert">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endif