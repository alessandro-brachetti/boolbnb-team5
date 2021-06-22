@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="{{asset($apartment->img)}}" alt="{{$apartment->title}}">
        <div class="card-body">
            <h5 class="card-title">{{$apartment->title}}</h5>
            <p class="card-text">Indirizzo: {{$apartment->address}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">N. Rooms: {{$apartment->n_rooms}}</li>
            <li class="list-group-item">N. Beds: {{$apartment->n_beds}}</li>
            <li class="list-group-item">N. Bathrooms: {{$apartment->n_bathrooms}}</li>
            <li class="list-group-item">MQ: {{$apartment->mq}}</li>
        </ul>
        <div class="card-body">
            Servizi:
            @foreach($apartment->services as $service)
                @if ($loop->last)
                    <span>{{$service->service_name}}</span>
                @else 
                    <span>{{$service->service_name}},</span>
                @endif
            @endforeach
        </div>
        <div class="card-body">
            <a href="{{route('admin.apartments.edit', ['apartment'=>$apartment->id])}}" class="card-link">Modifica</a>
            <a href="{{route('admin.message.index', ['apartment'=>$apartment->id])}}" class="card-link">Messaggi</a>
            <a href="{{route('admin.sponsor.index', ['apartment'=>$apartment->id])}}" class="card-link">Sponsor</a>
        </div>
      </div>
</div>

@endsection
