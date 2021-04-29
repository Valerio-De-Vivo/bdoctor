@extends('layouts.dashboard')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 >Promozioni</h2>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($plans as $plan)
                        <li class="list-group-item clearfix">
                            <div class="pull-left">
                                <h5>{{ $plan->name }}</h5>
                                <h5>{{ $plan->cost }} €</h5>
                                <h5>{{ $plan->description }}</h5>
                                @if(empty($activeplan))
                                  <a href="{{ route('plans.show', $plan->slug) }}" class="btn blu pull-right">Scegli questo pacchetto</a>
                                @elseif($activeplan->name == $plan->name)
                                  <a href="#" class="btn blu pull-right btn-success">Promozione attiva</a>
                                @endif
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
