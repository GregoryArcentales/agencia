<div class="modal" id="EliminarChofer" tabindex="-1" role="dialog">
    <div class="modal-dialog h-100 d-flex justify-content-center align-items-center" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Chofer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Se eliminará toda la información acerca de este chofer.<br>
            <span class="info-eliminar-chofer">*Las carreras realizadas por este chofer se mantendran, pero no su información de contacto</span>
            </p>
          <p>¿Desea Continuar?</p>
        </div>
        <div class="modal-footer">
         <form method="POST" action="{{route('eliminarChofer', $chofer->id)}}">
            @csrf @method('PUT')
              <button type="submit" class="btn btn-primary">Aceptar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         </form>
        </div>
      </div>
    </div>
  </div>
