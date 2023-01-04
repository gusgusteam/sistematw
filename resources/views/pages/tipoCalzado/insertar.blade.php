<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#create-tipoCalzado">
    <i class="fa fas-plus"></i> Nuevo tipo</button>
<div id="create-tipoCalzado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header style-info">
                <h5 class="modal-title" id="my-modal-title">Agregar tipoCalzado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tipoCalzado.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" required placeholder="Escribir Tipo de Calzado" class="form-control" name="tipo">
                        <small id="helpId" class="text-muted">(Campo Obligatorio)</small>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" required placeholder="" name="imagen" value=""
                                class="form-control form-control-sm">
                        <small id="helpId" class="text-muted">Seleccione una imagen(Campo Obligatorio)</small>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
