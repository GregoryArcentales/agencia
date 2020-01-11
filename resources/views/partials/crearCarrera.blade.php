<div class="modal fade" id="NuevaCarrera">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Nueva Carrera</h2>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-container container">
            <div class="row justify-content-center">
              <form id="formulario" method="POST" action="{{route('contactoCarrera')}}" class="col-12 col-lg-10 mt-4" >
               @csrf
             <div class="form-row">
                <div class="col px-3">
                    <label for="cliente">Cliente:</label>
                    <input class="form-control clienteNuevaCarrera" type="text" name="nombreCliente" placeholder="Nombre del cliente..." value="" readonly><br>
               </div>
                <div class="col px-3">
                       <label for="select">Selecciona un chofer:</label><br>
                       <select name="select" id="inputState" class="form-control">
                            <option selected value="">Seleccionar chofer</option>
                        @foreach ($choferes as $choferItem)
                       <option value="{{$choferItem->id}}">{{$choferItem->nombre}}</option>
                           @endforeach
                      </select><br>
                </div>
             </div>

             <div class="form-row">
                  <div class="col px-3">
                      <label for="dirSalida">{{ __('Dirección Salida') }}:</label><br>
                      <input id="salida" type="text" class="form-control @error('name') is-invalid @enderror" name="dirSalida" value="{{ old('Salida') }}" autocomplete="name" autofocus><br>
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span><br>
                     @enderror
                  </div>

                 <div class="col px-3">
                     <label for="name">{{ __('Dirección Destino') }}:</label>
                     <input id="destino" type="text" class="form-control @error('name') is-invalid @enderror" name="dirDestino" value="{{ old('Destino') }}" autocomplete="name" autofocus>
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                 </div>
             </div>
             <!--Div para los dos nuevos campos-->
             <div class="form-row">
                <!--Div para el campo "valor de la carrera"-->
                 <div class="col px-3">
                     <label for="number">{{ __('Valor de la carrera') }}:</label>
                     <input id="valor" type="number" step="any" class="form-control @error('number') is-invalid @enderror" name="valCarrera" value="{{ old('Costo') }}" autocomplete="number" autofocus>
                     @error('number')
                     <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                 </div>
                 <!--Div para el campo "gastos de la carrera"-->
                 <div class="col px-3">
                     <label for="number">{{ __('Gastos') }}:</label>
                     <input id="gasto" type="number" step="any" class="form-control @error('number') is-invalid @enderror" name="gastoCarrera" value="{{ old('Gasto') }}" autocomplete="number" autofocus>
                     @error('number')
                     <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                 </div>
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary enviar">Guardar</button>
            </div>
            <div class="error alert alert-danger" role="alert">
                Debe llenar todos los campos
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

