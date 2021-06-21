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
            <a href="{{route('admin.apartments.edit', ['apartment'=>$apartment->id])}}" class="card-link">Edit</a>
        </div>
      </div>
</div>
    
@endsection