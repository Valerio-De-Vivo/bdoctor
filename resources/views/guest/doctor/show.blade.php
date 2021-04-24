<!DOCTYPE html>
<html lang="it">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bdoctors - Dottore</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    </head>

    <body>
        {{-- MENU  --}}

        @include('layouts/partials/header')

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="container-single">

          <div class="col-md-8">

            <div class="header-doc">
              <div class="foto">
                <img src=" {{$profile->photo}} " alt="">
              </div>
              <div class="col-doc">
                <h1>{{$profile->name}} {{$profile->surname}}</h1>
                <h2> {{$specialization->specialization}} </h2>
              </div>
            </div>

            <div class="cv">
              <h3>Esperienza</h3>
              <p> {{$profile->cv}} </p>

              <a class="btn blu" href="#disponibilita">Contatta il medico {{$profile->surname}} </a>
            </div>
          </div>

          {{-- BANNER INFO  --}}

          <div id="app" style="align-self: center" class="col-md-4">
            <div class="info">
              <h2>Info</h2>
              <p> Prestazione in {{$performance->performance}}</p>

              <h2>Recensioni</h2>

              @for ($i = 0; $i < $rev->vote_user; $i++)
                <i class="fas fa-star"></i>
              @endfor
                <p> {{$rev->name_user}} {{$rev->surname_user}}: {{$rev->review_user}}</p>

                <h2 @click="recensione"> <i class="fas fa-angle-down"></i> Lascia una recensione </h2>
                <transition name="slide">
                  <form v-if="lasciaRecensione" action="{{url('/review')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <input type="text" class="d-none" value="{{$profile->id}}" name="doctor_id" required>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col">
                          <label for="nameUser">Nome</label>
                          <input type="text" class="form-control" id="nameUser" name="name_user" required>
                        </div>
                        <div class="col">
                          <label for="surnameUser">Cognome</label>
                          <input type="text" class="form-control" id="surnameUser" name="surname_user" required>
                        </div>
                        <div class="col">
                          <label for="voto">Voto</label>
                            <select class="form-control" id="voto" name="vote_user">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                          <label for="recensione" class="d-block">Recensione</label>
                          <textarea style="width: 100%"  id="recensione" name="review_user" ></textarea>
                    </div>
                    <button type="submit" class="btn green">Invia</button>
                  </form>
                </transition>
                
              
            </div>
          </div>

        </div>


        {{-- BANNER CONTATTI  --}}
        <div class="contact">
              <div class="col-md-4">
                <img src="{{ asset('img/common/location.png') }}" alt="">
                <h4> {{$profile->address}}, {{$profile->city}} </h4>
              </div>
              <div class="col-md-4">
                <img src="{{ asset('img/common/telephone.png') }}" alt="">
                <h4> {{$profile->telephone}} </h4>

              </div>
              <div class="col-md-4">
                <img src="{{ asset('img/common/mail.png') }}" alt="">
                <h4> {{$profile->user->email}} </h4>

              </div>
        </div>

        {{-- FORM MESSAGGIO  --}}

        <div id="disponibilita" class=" mex-container">
          <div class="col-md-8">
            <h2>Qui puoi inviare un messaggio direttamente al dott {{$profile->surname}}</h2>
            <form action="{{url('/message')}}" method="post">
              @csrf
              @method('POST')
              <div class="form-group">
                <input type="text" class="d-none" value="{{$profile->id}}" name="doctor_id" required>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <label for="nameUser">Nome</label>
                    <input type="text" class="form-control" id="nameUser" name="name_user" required>
                  </div>
                  <div class="col">
                    <label for="surnameUser">Cognome</label>
                    <input type="text" class="form-control" id="surnameUser" name="surname_user" required>
                  </div>
                  <div class="col">
                    <label for="mailUser">Email</label>
                    <input type="email" class="form-control" id="mailUser" name="mail_user" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="message" class="d-block">Messaggio</label>
                <textarea id="message" style="width: 100%; min-height: 300px" name="message_user" required></textarea>
              </div>
              <button type="submit" class="btn blu">Invia</button>
            </form>
          </div>

          <img src=" {{ asset('img/common/banner-search.png') }} " alt="">
        </div>


    </body>

    <script src=" {{ asset('js/app.js') }} "></script>

</html>



          {{-- <h1>{{$profile->id}}</h1>
          <h2>{{$profile->name}}</h2>
          <h2>{{$profile->surname}}</h2>
          <h3>Richiesta disponibilità</h3> --}}

          {{-- FORM MESSAGGIO  --}}
          {{-- <form action="{{url('/message')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
              <input type="text" class="d-none" value="{{$profile->id}}" name="doctor_id" required>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="nameUser">Name</label>
                  <input type="text" class="form-control" id="nameUser" name="name_user" required>
                </div>
                <div class="col">
                  <label for="surnameUser">Surname</label>
                  <input type="text" class="form-control" id="surnameUser" name="surname_user" required>
                </div>
                <div class="col">
                  <label for="mailUser">Email</label>
                  <input type="email" class="form-control" id="mailUser" name="mail_user" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="message" class="d-block">Message</label>
              <textarea id="message" name="message_user" rows="8" cols="100" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
          </form> --}}

          {{-- FORM RECENSIONE  --}}
          {{-- <form action="{{url('/review')}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
              <input type="text" class="d-none" value="{{$profile->id}}" name="doctor_id" required>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="nameUser">Nome</label>
                  <input type="text" class="form-control" id="nameUser" name="name_user" required>
                </div>
                <div class="col">
                  <label for="surnameUser">Cognome</label>
                  <input type="text" class="form-control" id="surnameUser" name="surname_user" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="voto">Voto</label>
                    <select class="form-control" id="voto" name="vote_user">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                </div>
                <div class="col">
                  <label for="recensione" class="d-block">Recensione</label>
                  <textarea id="recensione" name="review_user" rows="8" cols="100"></textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
          </form> --}}
