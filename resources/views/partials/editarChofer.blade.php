<!-- Modal para editar los datos del cliente-->
<div class="modal fade" id="EditarChofer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" action="{{route('actualizarChofer', $chofer->id)}}">
            @csrf @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Chofer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-4">
         <div class="form-group row">
           <label for="name" class="col-md-3 col-form-label text-md-left p-1">{{ __('Nombre') }}</label>
           <div class="col-md-9 m-0 p-0">
             <input id="nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre" value="{{ old('nombre', $chofer->nombre) }}" required autocomplete="name" autofocus>

             @error('name')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>
         </div>
         <div class="form-group row">
           <label for="name" class="col-md-3 col-form-label text-md-left p-1">{{ __('Apellido') }}</label>
           <div class="col-md-9 m-0 p-0">
             <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido', $chofer->apellido) }}" required autocomplete="name" autofocus>

             @error('name')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>
         </div>
         <div class="form-group row">
           <label for="number" class="col-md-3 col-form-label text-md-left p-1">{{ __('Teléfono') }}</label>
           <div class="col-md-9 m-0 p-0">
             <input id="numero" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('numero', $chofer->telefono) }}" required autocomplete="name" autofocus>

             @error('number')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>
         </div>
         <div class="form-group row">
           <label for="name" class="col-md-3 col-form-label text-md-left p-1">{{ __('Correo electrónico') }}</label>
           <div class="col-md-9 m-0 p-0">
             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $chofer->email) }}" required autocomplete="name" autofocus>

             @error('email')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
             @enderror
           </div>
         </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      <button type="submit" class="btn btn-primary" id="editCliente">Guardar cambios</button>
    </div>
    </form>
  </div>
</div>
</div>
