@extends('index')
@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h3 class="m-0">Calzados<h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Calzado</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-info btn-sm" href="{{ route('calzado.crear') }}">Agregar Calzado</a>
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        @include('pages.calzado.buscar')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive style-scroll">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="style-info">
                                <tr>
                                    <th>ID</th>
                                    <th style="min-width:150px">Descripcion</th>
                                    <th style="min-width:150px">Codigo</th>
                                    <th style="min-width:150px">Precio Venta</th>
                                    <th style="min-width:150px">Precio Compra</th>
                                    <th style="min-width:150px">Genero</th>
                                    <th style="min-width:150px">Marca</th>
                                    <th style="min-width:150px">Modelo</th>
                                    <th style="min-width:150px">Talla</th>
                                    <th style="min-width:150px">Color</th>
                                    <th style="min-width:150px">Imagen</th>
                                    <th style="min-width:150px">Categoria</th>
                                    <th style="min-width:150px">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calzados as $calzado)
                                    <tr>
                                        <td>{{ $calzado->id }}</td>
                                        <td>{{ $calzado->descripcion }}</td>
                                        <td>{{ $calzado->codigo }}</td>
                                        <td>{{ $calzado->precioVenta }}</td>
                                        <td>{{ $calzado->precioCompra }}</td>
                                        <td>{{ $calzado->tipo }}</td>
                                        <td>{{ @nombreMarca($calzado->idMarcaModelo) }}</td>
                                        <td>{{ @nombreModelo($calzado->idMarcaModelo) }}</td>
                                        <td>{{ $calzado->talla }}</td>
                                        <td>{{ $calzado->color }}</td>

                                        <td><img src="{{ asset($calzado->imagen) }}" alt="Girl in a jacket" width="80"
                                                height="80"></td>
                                        <td>{{ $calzado->categoria }} </td>
                                        <td>
                                            <a href="{{ route('calzado.edit', ['idCalzado' => $calzado->id]) }}"
                                                type="button" class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @include('pages.calzado.eliminar')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $calzados->links() }}
        </div>
    </section>
@endsection
