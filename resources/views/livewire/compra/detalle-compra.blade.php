<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h3 class="m-0">Compras</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compras</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('compra.create') }}" class="btn btn-info btn-sm">Nueva Compra</a>
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        <form>
                            <div class="input-group">
                                @if ($criterio=='fecha')
                                     <input type="date" class="form-control" name="searchText" placeholder="Buscar..."
                                    wire:model='searchText'>
                                @endif
                               @if ($criterio=='proveedor')
                                    <input type="text" class="form-control" name="searchText" placeholder="Buscar..."
                                    wire:model='searchText'>
                               
                               @endif
                                    
                               
                                <div class="form-group">
                                    <select class="form-control" name="" id=""wire:model='criterio'>
                                        @if ($criterio=='')
                                            <option value="">Seleccione Criterio</option>
                                        @endif
                                        
                                        <option value="proveedor">Proveedor</option>
                                        <option value="fecha">Fecha</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="style-info">
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Monto Total</th>
                                    <th>Proveedor</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                    <tr>
                                        <td>{{ $compra->id }}</td>
                                        <td>{{ $compra->fecha }}</td>
                                        <td>{{ $compra->montoTotal }}</td>
                                        <td>{{ $compra->nombre }} - {{ $compra->apellidos }}</td>
                                        <td>
                                            <a href="{{ route('pdf.compras', ['id' => $compra->id]) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-file"></i>
                                            </a>

                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#detalle-compra-modal{{ $compra->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <div wire:ignore.self class="modal fade" class="modal fade"
                                                id="detalle-compra-modal{{ $compra->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header style-success">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detalle
                                                                compra</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <section class="content">
                                                                <div class="container-fluid">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title"></h3>
                                                                            <h6>Proveedor:
                                                                                {{ @buscarProveedor(notaCompra($compra->id)->idProveedor)->nombre }}
                                                                                {{ @buscarProveedor(notaCompra($compra->id)->idProveedor)->apellidos }}
                                                                            </h6>
                                                                            <h6>Fecha:
                                                                                {{ @notaCompra($compra->id)->fecha }}
                                                                            </h6>

                                                                        </div>

                                                                        <div class="card-body">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-striped table-hover">
                                                                                    <thead class="style-success">
                                                                                        <tr>
                                                                                            <th>ID</th>
                                                                                            <th>Nombre</th>
                                                                                            <th>Precio</th>
                                                                                            <th>Cantidad</th>
                                                                                            <th>SubTotal</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach (@detalleCompra($compra->id) as $calzado)
                                                                                            <tr>
                                                                                                <td>{{ @calzado(@calzadoAlmacen($calzado->idCalzadoAlmacen)->idCalzado)->id }}
                                                                                                </td>
                                                                                                <td>{{ @calzado(@calzadoAlmacen($calzado->idCalzadoAlmacen)->idCalzado)->descripcion }}
                                                                                                </td>
                                                                                                <td>{{ @calzado(@calzadoAlmacen($calzado->idCalzadoAlmacen)->idCalzado)->precioCompra }}
                                                                                                </td>
                                                                                                <td>{{ $calzado->cantidad }}
                                                                                                </td>
                                                                                                <td>{{ $calzado->subTotal }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <td> TOTAL:</td>
                                                                                            <td> </td>
                                                                                            <td> </td>
                                                                                            <td> </td>
                                                                                            <td> {{ @notaCompra($compra->id)->montoTotal }}
                                                                                            </td>

                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-success btn-sm style-success"
                                                                data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            {{ $compras->links() }}
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
</div>
