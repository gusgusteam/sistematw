<section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            @if ($opcionAlmacen)
                {{-- <button wire:click='verListaPedido' class="btn btn-info btn-sm" type="button">Ver Calzados</button> --}}
                <button wire:click='verCalzadosSolicitados' class="btn btn-primary style-primary btn-sm" type="button">Ver Productos</button>
            @else
              <button wire:click='verListaPedido' class="btn btn-info btn-sm" type="button">Ver Pedidos</button>
            @endif
          <div class="card-tools">
              <button style="border-radius: 20px" class="btn btn-sm btn-secondary">
                  <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </button>
              <button style="border-radius: 20px" class="btn btn-sm btn-info" data-toggle="modal" data-target="#idCliente">
                  <i class="fa fa-user" aria-hidden="true"></i>
              </button>


              <!-- Modal -->
              <div class="modal fade" id="idCliente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header style-info">
                              <h5 class="modal-title">Cliente</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                          </div>
                          <div class="modal-body">
                              <div class="center">
                                  Nombre Completo : {{cliente($idCliente)->nombre}} {{cliente($idCliente)->apellidos}}

                              </div>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
        </div>
        <div class="card-body ">

          <div class="row">
              @if ($opcionAlmacen)
                  <div class="col-12">
                      <div class="table-responsive">
                          <table class="table table-bordered table-hovver">
                              <thead class="style-primary">
                                  <tr>
                                      <th>Id</th>
                                      <th>Almacen</th>
                                      <th>Stock Disponible</th>
                                      <th>Opcion</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($productoAlmacen as $item)
                                      <tr>
                                          <td>{{$item->id}}</td>
                                          <td>{{almacen($item->idAlmacen)->sigla}}</td>
                                          <td>{{$item->stock}}</td>
                                          <td>
                                              <button
                                                  wire:click='obtenerCalzadoDelAlmacen({{$item->idCalzado}},{{$item->idAlmacen}},{{$item->stock}})'
                                                  class="btn btn-sm btn-secondary">
                                                  <i class="fa fa-check-circle" aria-hidden="true"></i>
                                              </button>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              @else
                  <div class="col-12">
                      <div class="table-responsive">
                          <table class="table table-bordered hover">
                              <thead class="style-info">
                                  <tr>
                                      <th>Calzado</th>
                                      <th>Categoria</th>
                                      <th>Imagen</th>
                                      <th>Talla</th>
                                      <th>Cantidad</th>
                                      <th>Precio</th>
                                      <th>SubTotal</th>
                                      <th>Estado</th>
                                      <th>Opciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tbody>
                                      @foreach ($carritoDetalleSeleccionado as $carritoDetal)
                                          <tr>

                                              <td>{{$carritoDetal->descripcion}}</td>
                                              <td>{{categoria($carritoDetal->idCategoria)->nombre}}</td>
                                              <td>
                                                  <img width="80" height="80" src="{{asset($carritoDetal->imagen) }}" alt="">
                                              </td>
                                              <td>{{$carritoDetal->talla}}</td>

                                              <td>{{$carritoDetal->cantidad}}</td>
                                              <td>{{$carritoDetal->precioVenta}}</td>
                                              <td>{{operaciones($carritoDetal->cantidad,$carritoDetal->precioVenta,'*')}}</td>
                                              <td>


                                                  @if ($carritoDetal->estadoDetalle == 0)
                                                      <span class="badge badge-info">agregado</span>
                                                  @endif
                                                  @if ($carritoDetal->estadoDetalle == 1)
                                                      <span class="badge badge-success">solicitado</span>
                                                  @endif
                                                  @if ($carritoDetal->estadoDetalle == 2)
                                                      <span class="badge badge-success">seleecionado</span>
                                                  @endif

                                              </td>
                                              <td>
                                                  @if ($carritoDetal->estadoDetalle == 1)
                                                      <button type="button" class="btn btn-sm btn-info" wire:click='atenderCalzadoAlmacen({{$carritoDetal->idCalzado}},{{$carritoDetal->cantidad}},{{$carritoDetal->idDetalleCarrito}},{{$carritoDetal->refPedido}})'>
                                                          <i class="fa fa-archive" aria-hidden="true"></i>
                                                      </button>
                                                  @endif

                                                  @if ($carritoDetal->estadoDetalle == 0)
                                                      <button disabled type="button" class="btn btn-sm btn-info" wire:click='atenderCalzadoAlmacen({{$carritoDetal->idCalzado}},{{$carritoDetal->cantidad}},{{$carritoDetal->idDetalleCarrito}},{{$carritoDetal->refPedido}})'>
                                                          <i class="fa fa-archive" aria-hidden="true"></i>
                                                      </button>
                                                  @endif

                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </tbody>
                          </table>
                      </div>
                  </div>
              @endif
          </div>


        </div>
      </div>
    </div>
  </section>