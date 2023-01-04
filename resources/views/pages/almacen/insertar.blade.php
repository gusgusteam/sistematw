<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#create-almacen">
    <i class="fas fa-plus"></i>
    Nuevo Almacen
</button>
<div id="create-almacen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Almacen</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('almacen.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" placeholder="Escribir Sigla - Almacen" class="form-control form-control-sm"
                            name="sigla">
                        <small id="helpId" class="text-muted">Campo Obligatorio</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
