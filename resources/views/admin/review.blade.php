@extends('layouts.dashboard')

@section('content')
  @if (!empty($reviews))
    <div class=" d-flex flex-wrap justify-content-around">
      @foreach ($reviews as $rev)
        <div class="card col-md-12 m-2 p-2">
          <div class="card-body">
            <h2 style="color: #76c893">Recensione</h2>
            <h5 class="card-title">
              @for ($i=0; $i < $rev->vote_user; $i++)
                <i style="color:orange" class="fas fa-star"></i>
              @endfor
            </h5>
            <cite title="Source Title">da {{$rev->name_user}} {{$rev->surname_user}}</cite>
            <p class="card-text">{{$rev->review_user}}</p>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <h1>Nessuna recensione da mostrare</h1>
  @endif
@endsection
