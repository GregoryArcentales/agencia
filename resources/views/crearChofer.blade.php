@extends('layouts.layout')
@section('contenido')
<div class="p-4">
    <h1 class="text-center mt-3">REGISTRO DE UN NUEVO CHOFER</h1>
    <div class="form-container container">
       <div class="col-12">
            <div class="row justify-content-center">
            <form method="POST" action="{{route('contactoChofer')}}" class="col-12 col-lg-8 mt-4">
                     @csrf
                 <div class="form-group row">
                         <label for="name" class="col-md-3 col-form-label text-md-left p-1">{{ __('Nombre') }}</label>
                             <div class="col-md-9 m-0 p-0">
                                 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                     </div>
                     <div class="form-group row">
                        <label for="surname" class="col-md-3 col-form-label text-md-left p-1">{{ __('Apellido') }}</label>
                            <div class="col-md-9 m-0 p-0">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                     <div class="form-group row">
                         <label for="number" class="col-md-3 col-form-label text-md-left p-1">{{ __('Teléfono') }}</label>
                             <div class="col-md-9 m-0 p-0">
                                 <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" autocomplete="name" autofocus>

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
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="name" autofocus>

                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                     </div>
                     <div class="form-group row mb-0">
                                 <button type="submit" class="btn btn-primary col-md-2 col-12">
                                     {{ __('Register') }}
                                 </button>
                         </div>
                 </form>
            </div>
       </div>
    </div>
</div>

@endsection
