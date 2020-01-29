@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-header">
                    <h5 class="card-title text-center">Sign In</h5>
                </div>

                <div class="card-body">
                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf
                        <label for="email" class="ml-2">{{ __('E-Mail Address') }}:</label>
                        <div class="form-label-group">
                                <input id="email" type="email" id="inputEmail" placeholder="Ingrese un nombre o apellido" class="py-2 px-3 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                        </div>
                    <label for="password" class="ml-2">{{ __('Password') }}:</label>
                        <div class="form-label-group">
                                <input id="password" type="password" id="inputPassword" class="py-2 px-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>

                        <div class="form-label-group">

                                <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercas">
                                    {{ __('Login') }}
                                </button>


                            <div class="form-label-group">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                                @endif
                            </div>
                            <div class="form-label-group">
                                @if (Route::has('register'))
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Registrate aquí') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
