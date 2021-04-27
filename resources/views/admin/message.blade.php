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
    <div style="max-height: 400px" class=" d-flex flex-wrap justify-content-around">
      @foreach ($messages as $mess)
        <div class="card col-md-12 m-2">
          <div style="color: #184e77" class="card-body">
            <h2 style="color: #76c893">Messaggio</h2>
            <h5 class="card-title">Richiesta da {{$mess->name_user}}</h5>
            <p class="card-text">{{$mess->message_user}}</p>
            <cite title="Source Title">{{$mess->name_user}} {{$mess->surname_user}}</cite>
            <p class="card-text">Mail: {{$mess->mail_user}}</p>
            <a href="mailto:{{$mess->mail_user}}" class="btn blu">Rispondi alla disponibilità</a>
            <form style="margin-top:10px" action="{{ route('message.destroy', $mess) }}" method="post">
              @csrf
              @method('DELETE')
              <button style="color:white" type="submit" class="btn btn-danger"><i class="far fa-trash-alt" style="color:white"></i></button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <h1>Nessun messaggio da mostrare</h1>
  @endif
@endsection
