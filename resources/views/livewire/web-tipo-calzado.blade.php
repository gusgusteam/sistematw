{{-- https://programacionymas.com/blog/integrar-pagos-paypal-en-laravel --}}
<div>
  @auth
    <section id="about" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Productos {{$tipo->nombre}}</h2>
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p> --}}
        </div>
        <div class="row">
          {{-- @if (count($productos)) --}}
          @if (count($productos))
            @foreach ($productos as $producto)

              <div class="col-xl-3 col-lg-4 col-md-6" >
                <div class="member">
                  <div class="pic"><img src="{{ asset($producto->img) }}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>{{ $producto->descripcion }} 
                    <span>{{ $producto->precio }} .BOB</span>
                    <div class="social">
                      <a href="" wire:click='seleccionarCalzado({{$producto->idProducto}})' data-toggle="modal" data-target="#modal-detalle{{$producto->idProducto}}"><i class="fas fa-shopping-cart"></i></a>
                      <div wire:ignore.self class="modal fade" id="modal-detalle{{$producto->idProducto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            @if ($x)
                              <div class="modal-header">
                                  <button type="button" class="btn btn-info btn-sm" wire:click='ocultar' ><i class="fas fa-plus"></i> <i class="fas fa-shopping-cart"> </i></button>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                  <div class="card-body table-responsive">
                                    <div class="row">
                                      <div class="col-5">
                                        {{-- <img src="{{ asset(producto($producto->idProducto)->imagen) }}" width="100" height="400" class="card-img-top" alt="Card image cap"> --}}
                                        <h5 class="card-title"></h5>
                                      </div>
                                      <div class="col-6">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr style="font-size: 16px">
                                                    <th>{{ producto($producto->idProducto)->descripcion }}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <dl class="row">
                                                    <tr>
                                                        <td><dt class="col-sm-4">Categoria:</dt></td>
                                                        <td><dd class="col-sm-8">{{producto($producto->idProducto)->nombre}}</dd>
                                                    </tr>
                                                    <tr>
                                                        <td><dt class="col-sm-4">Producto:</dt></td>
                                                        <td><dd class="col-sm-8">{{producto($producto->idProducto)->descripcion}}</dd>
                                                    </tr>
                                                    <tr>
                                                        <td><dt class="col-sm-4">Tipo:</dt></td>
                                                        <td><dd class="col-sm-8">{{producto($producto->idProducto)->tipo}}</dd>
                                                    </tr>
                                                    <tr>
                                                        <td><dt class="col-sm-4">Precio:</dt></td>
                                                        <td><dd class="col-sm-8">{{producto($producto->idProducto)->precioVenta}}</dd>
                                                    </tr>
                                                </dl>
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  
                              </div>
                            @else
                              <div class="modal-header">
                                <h5 class="text-center title">
                                  <strong> Detalle su pedido </strong>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="">Cuantos deseas?</label>
                                      <input type="number" min="0" class="form-control" wire:model='cantidad' placeholder="Cantidad">
                                    </div>
                                    <div class="col-6">

                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info btn-sm" wire:click='mostrar' ><i class="fas fa-eye"> </i>Ver Producto </button>
                                <button data-dismiss="modal" aria-label="Close" type="button" class="btn btn-info btn-sm" wire:click='añadirCalzado({{Auth::user()->id}},{{$producto->idProducto}})' >
                                  <i class="fas fa-plus"></i>  Añadir al carrito
                                  <i class="fas fa-shopping-cart"></i>
                                </button>
                              </div>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            @endforeach
          @else
            <div class="text-center" >
              <br>
              <br>
              <h5 class="text-center">No se encontraron resultados de su busqueda</h5>
              <br>
            </div>
          @endif
        </div>
      </div>
    </section>
  @else
    <section id="about" class="team">
      <div class="container">

        <div class="section-title">
          <h2> Producto </h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
        </div>
        <div class="row">
          @foreach ($productos as $producto)

            <div class="col-xl-3 col-lg-4 col-md-6" >
              <div class="member">
                <div class="pic">
                  <img height="20" src="{{ asset($producto->img) }}" class="img-fluid" alt="">
                </div>
                <div class="member-info">
                  <h4>{{ $producto->descripcion }} 
                  <span>{{ $producto->precio }} .BOB</span>
                  <div class="social">

                    <a href="" data-toggle="modal" data-target="#modal-detalle{{$producto->idProducto}}"><i class="fas fa-eye"></i></a>
                    <a href="" data-toggle="modal" data-target="#modal-register"><i class="fas fa-shopping-cart"></i></a>

                    <div wire:ignore.self class="modal fade" id="modal-detalle{{$producto->idProducto}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card-body table-responsive">
                              <div class="row">
                                <div class="col-5">
                                    Imagen
                                </div>
                                <div class="col-6">

                                  <table class="table table-hover text-nowrap">
                                      <thead>
                                          <tr>
                                              <th>FICHA TECNICA</th>
                                              <th></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <dl class="row">
                                              <tr>
                                                  <td><dt class="col-sm-4">Categoria:</dt></td>
                                                  <td><dd class="col-sm-8">{{producto($producto->idProducto)->nombre}}</dd>
                                              </tr>
                                              <tr>
                                                  <td><dt class="col-sm-4">Calzado:</dt></td>
                                                  <td><dd class="col-sm-8">{{producto($producto->idProducto)->descripcion}}</dd>
                                              </tr>
                                              <tr>
                                                  <td><dt class="col-sm-4">Tipo:</dt></td>
                                                  <td><dd class="col-sm-8">{{producto($producto->idProducto)->tipo}}</dd>
                                              </tr>
                                          </dl>
                                      </tbody>
                                  </table>
                                </div>
                              </div>
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
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body register-card-body">
              <p class="login-box-msg">CREAR CUENTA</p>

              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3 input-group">
                  <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('name') }}" required placeholder="Nombre" autocomplete="name" autofocus>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>


                <div class="mb-3 input-group">
                  <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos" name="apellidos" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3 input-group">
                  <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" placeholder="telefono" name="telefono" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="mb-3 input-group">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="User name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3 input-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-3 input-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="new-password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>


                <div class="mb-3 input-group">
                  <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required autocomplete="new-password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>

                <div class="row">
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
  @endauth
</div>
