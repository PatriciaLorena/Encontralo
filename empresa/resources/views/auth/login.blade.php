@extends('adminlte::auth.login')

@section('content')
<div class="wrapper fadeInDown">
    <div id="formContent">
                <div class="active"><h1>{{ __('Encontralo!!') }}</h1></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                  <input type="text" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                  name="email" value="{{ old('email') }}" required  placeholder="Email">
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  <input type="password" id="password"  class="form-control @error('password') is-invalid @enderror"
                                  name="password" required  placeholder="Contraseña">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          <input type="submit" class="fadeIn fourth" value="iniciar sesión">

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="fadeIn fourth">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                              <div class="form-group row mb-0">
                                <div id="formFooter">
                                  @if (Route::has('password.request'))
                                      <a class="underlineHover" href="{{ route('password.request') }}">
                                          {{ __('¿Olvidaste tu contraseña?') }}
                                      </a>
                                  @endif
                                </div>
                              </div>
                    </form>
        </div>
    </div>
@endsection
