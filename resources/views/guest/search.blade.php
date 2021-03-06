<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bdoctors - Search</title>
        <!-- GSAP E SCROLLTRIGGER  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
    
        </head>
    <body>
        {{-- MENU  --}}

        @include('layouts/partials/header')


        {{-- FORM  --}}
    <div id="app" class="">
      <div class="banner-search">
        <div class="container">
          <h1>Cerca il Dottore</h1>
          <form>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Nome e cognome</label>
                <input type="text" class="form-control" id="inputEmail4" name="search" placeholder="Nome cognome" @keyup="doctorFilter" v-model="newFilter">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Citt??</label>
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
        </div>
      </div>

      {{-- CICLO VUE  --}}
      
      <div>
        <div class="container-doc">

          <div class="card-doc" v-for="contact in filtered">

            <img :src=" contact.photo " alt="Dottore">
            
            <h2>@{{ contact.name }} <br> @{{ contact.surname }}</h2>

            <div class="card-info">
              <span><i class="fas fa-map-marker-alt"></i> <p>@{{ contact.city }}</p> </span>
              <span><i class="fas fa-phone"></i> <p>@{{ contact.telephone }}</p> </span>
            </div>
            <p style="color: #168aad;">Ultime recensioni ricevute</p>

            {{-- RECENSIONI  --}}
            <div class="rev-container">
              <div v-for="rev in review">
                <div class="rev" v-if="rev.doctor_id == contact.id">
                  <p> @{{rev.name_user}} </p>
                  <i v-for="n in rev.vote_user" class="fas fa-star"></i>
                </div>
              </div>
            </div>

            {{-- CTA  --}}
            <div class="card-btn">
              <a class="btn verde" :href=" link + '/' + contact.id ">
                Dettagli
              </a>
              <a class="btn blu" :href=" link + '/' + contact.id + '/#disponibilita' ">
                Messaggio
              </a>  
            </div>
          </div>
      </div>
    </div>


    @include('layouts/partials/footer')


    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

    </body>
</html>
