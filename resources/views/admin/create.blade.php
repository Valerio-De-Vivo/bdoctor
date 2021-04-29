@extends('layouts.dashboard')

@section('content')
    @if (session('status'))
    <div class="container">
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    </div>
    @endif
    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 py-4" style="margin-top: 60px;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            
            
            <form class="col-md-8" method="post" action="{{route('doctor.update', $dati_dottore->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="image">Carica l'immagine</label>
                <input type="text" class="form-control" id="image" value="{{$dati_dottore->photo}}" name='photo'>
            </div>
            <div class="mb-3 form-group">
                <label for="address" class="form-label">Indirizzo*</label>
                <input type="text" class="form-control" id="address" value="{{$dati_dottore->address}}" name='address'>
            </div>
            <div class="mb-3 form-group">
                <label for="city" class="form-label">Città*</label>
                <input type="text" class="form-control" id="city" value="{{$dati_dottore->city}}" name='city'>
            </div>
            <div class="mb-3 form-group">
                <label class="form-label d-block">Specializzazione*:</label>
                @foreach ($specializations as $spec)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{$spec->id}}" value="{{$spec->specialization}}" name='specialization'>
                        {{--  {{$dati_dottore->id->contains($specializations->id) ? 'checked' : '' }}--}}
                        <label class="form-check-label" for="{{$spec->id}}">{{$spec->specialization}}</label>

                    </div>
                @endforeach

            </div>

            <div class="mb-3 form-group">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="phone" value="{{$dati_dottore->telephone}}" name="telephone">
            </div>

            <div class="mb-3 form-group">

                <label class="form-label d-block">Prestazione:</label>
                @foreach ($performance as $element)

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="pres{{$element->id}}" value="{{$element->performance}}" name='performance'>
                    <label class="form-check-label" for="pres{{$element->id}}">{{$element->performance}}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="curriculum">Curriculum Vitae</label>
                <textarea class="form-control" name="cv" rows="10" id="curriculum">{{$dati_dottore->cv}}</textarea>
            </div>

            <div id="emailHelp" class="form-text mb-3">*: campo obbligatorio</div>
            <button type="submit" class="btn blu">Invia</button>
        </form>
        
    </main>
@endsection
