@extends('layouts.dashboard')

@section('content')
  @if (session('status'))
    <div class="container">
      <div class="alert alert-warning">
        {{ session('status') }}
      </div>
    </div>
  @endif
  @if (!empty($messages))
    <div class="container d-flex flex-wrap justify-content-around">
      @foreach ($messages as $mess)
        <div class="card col-md-3 m-2">
          <div class="card-header">Messaggio</div>
          <div class="card-body">
            <h5 class="card-title">Richiesta da {{$mess->name_user}}</h5>
            <p class="card-text">{{$mess->message_user}}</p>
            <cite title="Source Title">{{$mess->name_user}} {{$mess->surname_user}}</cite>
            <p class="card-text">Mail: {{$mess->mail_user}}</p>
            <a href="mailto:{{$mess->mail_user}}" class="btn btn-primary">Rispondi alla disponibilità</a>
            <form action="{{ route('message.destroy', $mess) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <h1>Nessun messaggio da mostrare</h1>
  @endif
@endsection
