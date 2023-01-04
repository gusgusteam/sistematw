<a href="#" type="button" class="btn style-success btn-sm btn-success" data-toggle="modal"
    data-target="#update-marcsModelo{{ $marcaModelo->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-marcsModelo{{ $marcaModelo->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header style-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Marca Modelo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form action="{{ route('marcaModelo.update', ['id' => $marcaModelo->id]) }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" value="{{ $marcaModelo->talla }}" required
                                class="form-control-sm form-control" name="talla">
                            <small class="text-muted">Escribir la Talla</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" value="{{ $marcaModelo->color }}" required
                                class="form-control-sm form-control" name="color">
                            <small class="text-muted">Escribir el color</small>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <select required class="form-control-sm form-control select2" name="idMarca"
                            style="width: 100%;">
                            @foreach (@marcas() as $marc)
                                <option value="{{ $marc->id }}">{{ $marc->nombre }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Seleccione una Marca</small>
                    </div>

                    <div class="form-group col-12">
                        <select required class="form-control-sm form-control select2" name="idModelo"
                            style="width: 100%;">
                            @foreach (@modelos() as $mode)
                                <option value="{{ $mode->id }}">{{ $mode->nombre }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Escribir un Modelo</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success style-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
