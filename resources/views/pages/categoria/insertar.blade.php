<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#create-modelo">
    <i class="fa fas-plus"></i> Nueva Categoria</button>
<div id="create-modelo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header style-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Categoria</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categoria.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" required placeholder="Escribir Categoria"
                            class="form-control form-control-sm" name="nombre">
                        <small id="helpId" class="text-muted">Campo Obligatorio</small>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" required placeholder="Escribir Categoria" name="imagen"
                            class="form-control form-control-sm">
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
