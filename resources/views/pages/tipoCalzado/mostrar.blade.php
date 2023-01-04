@extends('index')
@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h3 class="m-0">Registrar Tipo de Calzados</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tipo de Calzados</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    @include('pages.tipoCalzado.insertar')
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        @include('pages.tipoCalzado.buscar')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="style-info">
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo</th>
                                    <th>Imagen</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipoCalzados as $tipoCalzado)
                                    <tr>
                                        <td>{{ $tipoCalzado->id }}</td>
                                        <td>{{ $tipoCalzado->tipo }}</td>
                                        @if ($tipoCalzado->logo)
                                            <td><img src="{{ asset($tipoCalzado->logo) }}" width="100" height="100"
                                                    alt="">
                                            </td>
                                        @else
                                            <td>
                                                <div class="spinner-border text-info" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </td>
                                        @endif
                                        <td>
                                            @include('pages.tipoCalzado.actualizar')
                                            @include('pages.tipoCalzado.eliminar')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $tipoCalzados->links() }}
        </div>
    </section>
@endsection
