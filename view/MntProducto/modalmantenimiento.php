<div id="modalMantenimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo">Title</h5>
            </div>
            <form action="" method="post" id="formProducto">
                <div class="modal-body">
                <input type="hidden" name="prod_id" id="prod_id">
                    <div class="form-group">
                        <label for="prod_nom" class="form-label">Nombre</label>
                        <input id="prod_nom" class="form-control" type="text" name="prod_nom" required>
                    </div> 

                    <div class="form-group">
                        <label for="prod_desc" class="form-label">Descripción</label>
                        <textarea class="form-control" placeholder="Ingrese Descripción" id="prod_desc" name="prod_desc" style="height: 100px"></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Guardar</button>

                    <button class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fas fa-times-circle"></span>
                         Cerrar
                </button>
                </div>
            </form>
        </div>
    </div>
</div>