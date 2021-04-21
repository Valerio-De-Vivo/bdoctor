<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bdoctors dashboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark flex-md-nowrap p-0" style="position: fixed; width: 100%;z-index: 9; background-color:#EDF9FD;">
        <img src="{{ asset('img/common/logo.png') }}" alt="logo" style="width: 120px;">
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: #184E77" href="#">Homepage Bdoctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #184E77" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block slider py-4" style="position: fixed; top: 120px;">
                <div class="">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link dashboard-link {{ (Request::route()->getName() == 'dashboard-dottore') ? 'dashboard-active' : '' }}" href="{{route('dashboard-dottore')}}">
                                <i class="fas fa-user"></i>
                                Antonio Rossi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dashboard-link {{ (Request::route()->getName() == 'profilo-dottore') ? 'dashboard-active' : '' }}" href="{{route('profilo-dottore')}}">
                                <i class="fas fa-address-card"></i>
                                Modifica profilo
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link dashboard-link {{(Request::route()->getName() == 'message') ? 'dashboard-active' : '' }}" href="{{route('admin.message')}}"> --}}
                                <i class="fas fa-comments"></i>
                                Messaggi
                            {{-- </a> --}}
                        </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link dashboard-link {{(Request::route()->getName() == 'review') ? 'dashboard-active' : '' }}" href="{{route('admin.review')}}"> --}}
                                <i class="fas fa-star"></i>
                                Recensioni
                            {{-- </a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dashboard-link {{ (Request::route()->getName() == 'sponsorizzazioni-dottore') ? 'dashboard-active' : '' }}" href="{{route('sponsorizzazioni-dottore')}}">
                                <i class="fas fa-dollar-sign"></i>
                                Sponsorizzazioni
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
  </div>
</body>
</html>
