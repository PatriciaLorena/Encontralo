<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="wrapper fadeInDown">
      <div id="formContent">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Authentication Links -->
                        @guest
                                <h2 class="active"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a></h2>
                        @if (Route::has('register'))
                                <h2 class="inactive underlineHover">  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></h2>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="underlineHover" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
        <main class="py-4">
            @yield('content')
        </main>
        </div>
        </div>
</html>
