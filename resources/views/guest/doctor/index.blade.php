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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

    </head>

    <body>
        {{-- MENU  --}}

        @include('layouts/partials/header')

        @foreach ($sub as $subscription)

            @foreach ($profilo as $profil)
                @if ($subscription->user_id == $profil->id)

                <div style="min-height: calc(100vh - 100px)" class="container-doc">
                    <div style="height: 500px" class="card-doc">

                        <img src=" {{ $profil->photo }} " alt="Dottore">
                        
                        <h2>{{ $profil->name }} <br> {{ $profil->surname }}</h2>
            
                        <div class="card-info">
                            <span><i class="fas fa-map-marker-alt"></i> <p>{{ $profil->city }}</p> </span>
                            <span><i class="fas fa-phone"></i> <p>{{ $profil->telephone }}</p> </span>
                        </div>

                        <a class="btn green" href=" {{ route('show.doctor', [$profil->id]) }} "> Dettagli </a>
                    </div>
                </div>
                @endif
            @endforeach
            
        @endforeach


        @include('layouts/partials/footer')

    </body>

</html>
