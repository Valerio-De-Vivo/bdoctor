<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- GSAP E SCROLLTRIGGER  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="main-menu">
        <div class="logo-section">
            <img class="logo" src="img/common/logo.png" alt="logo">
        </div>

        <div class="menu-item">
            <ul>
                <li>
                    <a class=" {{ (Request::route()->getName() == 'guest-index') ? 'active' : '' }} " href="{{route('guest-index')}}">Home</a>
                </li>
                <li>
                    <a class=" {{ (Request::route()->getName() == 'ricerca-avanzata') ? 'active' : '' }} " href=" {{route('ricerca-avanzata')}} ">Ricerca Avanzata</a>
                </li>
                <li>
                    <a class=" {{ (Request::route()->getName() == 'show.doctors') ? 'active' : '' }} " href="{{route('show.doctors')}}">Dottori</a>
                </li>
                
                <li>
                    <a class=" {{ (Request::route()->getName() == 'contatti') ? 'active' : '' }} " href="">Contatti</a>
                </li>
            </ul>
        </div>

        <div class="login">
            <ul>
            @if (Route::has('login'))
                @auth
                  <li class="">
                    <a class="btn green" href="{{ route('dashboard-dottore') }}">Dashboard dottore</a>
                  </li>
                @else
                  <li class="">
                    <a id="log" class="" href="{{ route('login') }}">Accedi</a>
                  </li>

                    @if (Route::has('register'))
                      <li class="">
                        <a id="reg" class="" href="{{ route('register') }}">Sei un dottore? Iscriviti</a>
                      </li>
                    @endif
                @endauth
            @endif
            </ul>
        </div>
    </header>

    @yield('content')
</body>
</html>
