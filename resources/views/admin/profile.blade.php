@extends('layouts.dashboard')

@section('content')
  <main role="main" style="margin-top: 120px; color: #76c893">
      <h1> Benvenuto nella tua Dashboard {{$item->name}}  </h1>
      <h2 style="color: #168aad">
        Hai {{$rev->count()}} recensioni e {{$mess->count()}} messaggi 
      </h2>
  </main>
@endsection
