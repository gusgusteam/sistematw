<div>
    @auth
        @role('cliente')
            <section id="topbar" class="d-none d-lg-block">

                <div class="container clearfix">
                    <div class="float-left contact-info">
                    </div>
                    <div class="float-right social-links">

                        @if (!@boolRuta('pagos'))
                            <a href="#" data-toggle="modal" data-target="#carrito-modal" class="linkedin">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                                <span class="badge badge-success">{{ @contarCarrito($idCliente) }} </span>
                            </a>
                        @endif

                        <i class="fas fa-user fa-2x"></i><a href="mailto:contact@example.com">{{ Auth::user()->name }}</a>

                        <div wire:ignore.self class="modal fade" id="carrito-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #27467bd5;  ">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #fff ; font-weight: 700">TU CESTA DE COMPRA</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tabla" style="display: block">
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table id="detalle" class="table table-hover table-bordered">
                                                        <thead class="">
                                                            <th>PRODUCTO</th>
                                                            <th>CANTIDAD</th>
                                                            <th>PRECIO </th>
                                                            <th>SUBTOTAL</th>
                                                            <th>OPCIONES</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($carrito as $car)
                                                                <tr>
                                                                    <td>{{ @producto($car->idProducto)->descripcion }}
                                                                        {{ @producto($car->idProducto)->color }} <br>

                                                                        {{ @producto($car->idProducto)->marca }}
                                                                        {{ @producto($car->idProducto)->modelo }}
                                                                    </td>
                                                                    <td>{{ $car->cantidad }}</td>
                                                                    <td>{{ @producto($car->idProducto)->precioVenta }}</td>
                                                                    <td>{{ @producto($car->idProducto)->precioVenta * $car->cantidad }}
                                                                    </td>
                                                                    <td><button class="btn btn-sm btn-danger"
                                                                            wire:click='eliminar({{ $car->id }})'><i
                                                                                class="fas fa-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <th colspan="4">TOTAL</th>
                                                            <th>
                                                                <h6 id="total"> Bs/. {{ $total }}</h6>
                                                            </th>
                                                        </tfoot>
                                                    </table>
                                                    @if (!$estadoCarrito)
                                                        <a href="{{ route('web.pago', ['id' => $idCliente]) }}"
                                                            style=" padding: 15px;  border-radius: 20px; color: #fff; background-color: #16438e" >Realizar Pedido
                                                        </a>
                                                    @else
                                                        <span style="color : rgb(130, 121, 121)"> Usted tiene un pedido pendiente</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endrole
    @endauth
</div>