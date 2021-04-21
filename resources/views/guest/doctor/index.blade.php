<!DOCTYPE html>
<html lang="it">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bdoctors - Search</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    </head>

    <body>
        {{-- MENU  --}}
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
                      <li class="nav-item">
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
    </body>

</html>

