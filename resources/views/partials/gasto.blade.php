<div class="modal" id="Gasto" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100 d-flex justify-content-center align-items-center" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title">Generar Gasto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="container-gasto mx-4">
              <div class="nombreGasto mb-2">
                  <label for="nombreGasto">nombre:</label>
                  <input id="nombreGasto" type="text" class="form-control" name="nombreGasto" value="{{old('nombreGasto') }}" autocomplete="nombreGasto" autofocus required>
              </div>
              <div class="gasto">
                <label for="gasto">Cantidad:</label>
                <input id="gasto" type="number" step="any" class="form-control" name="gasto" value="{{old('gasto') }}" autocomplete="gasto" autofocus required>
            </div>
         </div>
        </div>
        <div class="modal-footer">
         <form>
              <button type="submit" class="btn btn-primary btn-crearGasto" data-dismiss="modal">Crear</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         </form>
        </div>
      </div>
    </div>
  </div>
