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

        <div class="container">

          <h1>{{$profile->id}}</h1>
          <h2>{{$profile->name}}</h2>
          <h2>{{$profile->surname}}</h2>

          <form action="{{route('guest.doctor.show')}}" method="post">
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
          </form>
        </div>

    </body>

</html>
