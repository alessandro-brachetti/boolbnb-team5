@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      <div class="apartments d-flex flex-wrap">
        @foreach(Auth::user()->apartments as $apartment)
        <a href="{{route('admin.apartments.show', ['apartment'=> $apartment->id])}}" class="card-link">
          <div class="card" style="width: 18rem;">
            <div class="card-img-top" style="background: url({{asset($apartment->img)}}); height: 14rem; background-size: cover;"></div>
            <div class="card-body">
              <h5 class="card-title">{{$apartment->title}}</h5>
              <p class="card-text">Indirizzo: {{$apartment->address}}</p>
            </div>   
          </div>
        </a>
        <div class="card-body">
          <a href="{{route('admin.apartments.edit', ['apartment'=>$apartment->id])}}" class="card-link">Modifica</a>
          <a href="{{route('admin.message.index', ['apartment'=>$apartment->id])}}" class="card-link">Messaggi</a>
          <a href="{{route('admin.message.index', ['apartment'=>$apartment->id])}}" class="card-link">Sponsor</a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
  
@endsection