@extends('layouts.dashboard')

@section('content')
  <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 py-4" style="margin-top: 150px;">
    <div class="container d-flex justify-content-around">
      <div class="card" style="width: 30%; background-color: #DEEF9F">
        <img src="{{ asset('img/sponsor/standard.jpg') }}" class="card-img-top" alt="Prezzo sponsorizzazione">
        <div class="card-body">
          <h5 class="card-title">2,99 €</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
      <div class="card" style="width: 30%; background-color: #86CF9F">
        <img src="{{ asset('img/sponsor/premium.jpg') }}" class="card-img-top" alt="Prezzo sponsorizzazione">
        <div class="card-body">
          <h5 class="card-title">5,99 €</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
      <div class="card" style="width: 30%; background-color: #1BA5CE">
        <img src="{{ asset('img/sponsor/gold.jpg') }}" class="card-img-top" alt="Prezzo sponsorizzazione">
        <div class="card-body">
          <h5 class="card-title">9,99 €</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    </div>
  </main>
@endsection
