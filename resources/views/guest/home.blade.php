<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- GSAP E SCROLLTRIGGER  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js"></script>
        <title>Bdoctors</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        
        </head>
    <body >
        {{-- MENU  --}}

        @include('layouts/partials/header')

        <div class="jumbo">
            <div class="col-lg-7 banner-text">
                <div class="centrato">
                    <h1>BDoctor</h1>
                    <h3>Il primo portale italiano di dottori</h3>
                    <a class="btn green" href="{{ route('ricerca-avanzata') }}"> Ricerca dottore </a>
                    <a class="btn" href="#come-funziona"> Come funziona </a>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('img/common/banner-home.png') }}" alt="">
            </div>
        </div>

        {{-- SPECIALIZZAZIONI  --}}

        <section id="app" class="categories">
            <h2>Le specializzazioni più richieste, anche in videoconsulto</h2>
            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-ortopedia.png') }}" alt="">
                    <h3>Ortopedia</h3>
                </div>
            </div>

            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-dermatologo.png') }}" alt="">
                    <h3>Dermatologo</h3>
                </div>
            </div>

            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-ginecologia.png') }}" alt="">
                    <h3>Ginecologo</h3>
                </div>
            </div>

            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-otorino.png') }}" alt="">
                    <h3>Otorino</h3>
                </div>
            </div>

            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-oculista.png') }}" alt="">
                    <h3>Oculista</h3>
                </div>
            </div>

            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-urologo.png') }}" alt="">
                    <h3>Urologo</h3>
                </div>
            </div>

            <div class="category">
                <div style="text-align: center">
                    <img src="{{ asset('img/common/icon-cardiologo.png') }}" alt="">
                    <h3>Cardiologo</h3>
                </div>
            </div>
            <a class="cta" href="{{ route('show.doctors') }}">
                Cerca tra i migliori medici nel campo
            </a>
        </section>

        {{-- COME FUNZIONA  --}}

        <div id="come-funziona" class="jumbo come-funziona">
            <div class="col-md-6 banner-text">
                <div class="centrato">
                    <h3>Prenota il videoconsulto</h3>
                    <p>
                        Trova lo specialista ideale che offra il videoconsulto. Scegli data e ora e prenota la tua visita con un click. 
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_wdXBRc.json"  background="transparent"  speed="1"  style="width: 100%; height: 100%;"  loop  autoplay></lottie-player>
                {{-- <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_l13zwx3i.json"  background="transparent"  speed="1"  style="width: 100%; height: 700px;"  loop  autoplay></lottie-player> --}}

            </div>
        </div>

        <div id="come-funziona" class="jumbo">
            <div class="col-md-6">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_42B8LS.json"  background="transparent"  speed="1"  style="width: 100%; height:700px;"  loop  autoplay></lottie-player>

            </div>
            <div class="col-md-6 banner-text">
                <div class="centrato">
                    <h3>Ricevi le istruzioni</h3>
                    <p>
                        Ricevi una mail con le istruzioni per accedere al videoconsulto. Utilizza la nostra messaggistica privata per interagire con il medico. 
                    </p>
                </div>
            </div>
            
        </div>

        <div id="come-funziona" class="jumbo">
            
            <div class="col-md-6 banner-text">
                <div class="centrato">
                    <h3>Effettua la visita</h3>
                    <p>
                        Accedi al servizio all'interno della tua area personale all'ora e alla data prestabilita. Troverai ad attenderti lo specialista richiesto per la consulenza. 
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_vPnn3K.json"  background="transparent"  speed="1"  style="width: 100%; height: 700px;"  loop  autoplay></lottie-player>

            </div>
            
        </div>

        @include('layouts/partials/footer')


    
        <script src="{{ asset('js/app.js') }}"></script>
    
    
    </body>
</html>
