<a href="#" type="button" class="btn style-success btn-sm btn-success" data-toggle="modal"
    data-target="#update-tipoCalzado{{ $tipoCalzado->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-tipoCalzado{{ $tipoCalzado->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header style-success">
                <h5 class="modal-title" id="my-modal-title">Modificar tipoCalzado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tipoCalzado.update', ['id' => $tipoCalzado->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="tipo" value="{{ $tipoCalzado->tipo }}">
                        <small id="helpId" class="text-muted">Escribir Tipo de Calzado(Campo Obligatorio)</small>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="imagen" value="" class="form-control form-control-sm">
                            <small id="helpId" class="text-muted">Seleccione una imagen(Campo Obligatorio)</small>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm style-success btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
