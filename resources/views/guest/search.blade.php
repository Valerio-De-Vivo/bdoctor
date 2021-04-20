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

</head>
<body id="search">
  <div id="app">
  <section class="jumbo" style="background:linear-gradient(180deg,#4689cf,#21b2d6);">
    <nav class="navbar navbar-expand-lg navbar-light pt-3">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/common/logo.png" width="120" height="120" class="d-inline-block align-top" alt="Bdoctors logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('guest-index')}}">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Ricerca avanzata</a>
            </li>
            @if (Route::has('login'))
                    @auth
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard-dottore') }}">Dashboard dottore</a>
                      </li>
                    @else
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                      </li>

                        @if (Route::has('register'))
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Sei un dottore? Iscriviti</a>
                          </li>
                        @endif
                    @endauth
            @endif
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Migliori dottori</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <form style="margin-top: 100px; margin-bottom: 50px;">
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



<!-- QUI TERMINA -->


    </div>
    <img src="img/search/jumbotron_bg.svg" alt="Jumbotron image">
  </section>
  <img src="img/search/jumbotron_wave.svg" alt="Jumbotron image" style="height: 150px; width: 100%; margin-bottom:50px;">
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
  <img src="img/search/footer_wave.svg" alt="Footer image" style="height: 150px; width: 100%;">
  <footer style="background: linear-gradient(0deg, rgba(118,200,147,1) 0%, rgba(217,237,146,1) 100%);">
    <div class="container p-2">
      <!-- FOOTER HEADER -->
      <div class="row justify-content-between mb-2 pt-3">
        <div class="col-xs-12 col-sm-9">
          <h4>BDOCTORS - ITALIA</h4>
        </div>

        <div class="col-xs-12 col-sm-3">
          <ul class="d-flex pippo">
            <li>Seguici su</li>
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-facebook-square"></i></li>
            <li><i class="fab fa-instagram"></i></li>
            <li><i class="fab fa-youtube"></i></li>
            <li><i class="fab fa-linkedin"></i></li>
          </ul>
        </div>
      </div>
      <!-- / FOOTER HEADER -->

      <!-- FOOTER BOTTOM -->
      <div class="row">
        <!-- BOX  -->
        <div class="col-xs-12 col-sm-6 col-md-3 ">
          <ul>
            <li>
              <h5>Chi siamo</h5>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul>
        </div>
        <!-- / BOX  -->

        <!-- BOX -->
        <div class="col-xs-12 col-sm-6 col-md-3 ">
          <ul>
            <li>
              <h5>Community</h5>
            </li>

            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul>
        </div>
        <!-- / BOX -->

        <!-- BOX -->
        <div class="col-xs-12 col-sm-6 col-md-3 ">
          <ul>
            <li>
              <h5>Community</h5>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
            <li>
              <a href="#">Lorem ipsum dolor sit amet</a>
            </li>
          </ul>
        </div>
        <!-- / BOX -->

        <!-- BOX  -->
        <div class="col-xs-12 col-sm-6 col-md-3 ">
          <ul>
            <li>
              <h5>Support</h5>
            </li>
            <li>
              <a href="#"><i class="fab fa-cc-visa"></i> Visa</a>
            </li>
            <li>
              <a href="#"><i class="fab fa-cc-mastercard"></i> Mastercard</a>
            </li>
            <li>
              <a href="#"><i class="fab fa-cc-paypal"></i> Paypal</a>
            </li>
            <li>
              <a href="#"><i class="fab fa-cc-apple-pay"></i> Apple pay</a>
            </li>
          </ul>
        </div>
        <!-- / BOX  -->

      </div>


    </div>

    <div class="container-fluid mio">
      <div class="row d-flex flex-column align-items-center">
        <div class=" text-center p-2">
          <div class="box-top-copy">
            <span><em>Copyright &copy; 2021 BDoctors</em> | All Rights Reserved</span>
          </div>
          <div class="box-bottom-copy">
            <small>

                  <a href="#">TERMINI E CONDIZIONI</a>

                  <a href="#">POLITICHE AZIENDALI</a>

            </small>
          </div>
        </div>
      </div>
    </div>
  </footer>
  </div>
  <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
</body>
</html>
