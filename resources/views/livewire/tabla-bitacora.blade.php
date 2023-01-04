<div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="card-tools">
                        <form >
                        <div class="input-group-prepend">
                            <input wire:model='buscar'type="text" class="form-control form-control-sm" style="border-radius: 20px" name="searchText"
                                placeholder="Buscar registro" >
                            <button style="border: none; background: none ; position: relative; right: 17%; " class="btn btn-primary btn-sm"
                                type="submit"><i style="color:#ccc" class="fas fa-search"></i>
                            </button>
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
                                    <th>Hora</th>
                                    <th>Tabla</th>
                                    <th>Transaccion</th>
                                    <th>Codigo Tabla</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $bitacora)
                                    <tr>
                                        <td>{{ $bitacora->id }}</td>
                                        <td>{{ $bitacora->fecha }}</td>
                                        <td>{{ $bitacora->hora }}</td>
                                        <td>{{ $bitacora->tabla }}</td>
                                        <td>{{ $bitacora->transaccion }}</td>
                                        <td>{{ $bitacora->codigoTabla }}</td>
                                        <td>{{ $bitacora->idUser }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $data->links() }}
        </div>
    </section>
</div>
