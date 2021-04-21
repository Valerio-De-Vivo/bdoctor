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


        {{-- FORM  --}}
    <div id="app" class="container">
      <form>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Nome e cognome</label>
            <input type="text" class="form-control" id="inputEmail4" name="search" placeholder="Nome cognome" @keyup="doctorFilter" v-model="newFilter">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Città</label>
            <select id="inputCity" class="form-control" @change="doctorFilter($event)">
              <option selected value="All">Tutta Italia</option>
              <option v-for="citta in cittaDisponibili" :value="citta">
                @{{ citta }}
              </option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Tipologia di visita</label>
            <select id="inputState" class="form-control">
              <option selected>In sede o da remoto</option>
              <option>In sede</option>
              <option>Da remoto</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <p>Medici trovati: @{{ nRisultato }}</p>
          </div>
        </div>
      </form>
      <div id="results">
        <div class="container-special">
          <div class="card-special" v-for="contact in filtered">
            <img src="img/common/doctor_avatar.jpg" alt="Dottore">
            <h1>@{{ contact.nome }}<br>@{{ contact.cognome }}</h1>
            <br>
            <p>@{{ contact.bio }}</p>
            <br>
            <div class="card-info">
              <p><i class="fas fa-map-marker-alt"></i> @{{ contact.citta }}</p>
              <p><i class="fas fa-phone"></i> @{{ contact.telefono }}</p>
            </div>
            <br>
            <p>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </p>
            <br><br>
            <div class="card-btn">
              <div class="card-btn-link">
                Scheda dottore
              </div>
              <div class="card-btn-link">
                Richiedi disponibilità
              </div>
            </div>
          </div>
          <div class="overlay"></div>
        </div>
      </div>
    </div>




    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

    </body>
</html>
