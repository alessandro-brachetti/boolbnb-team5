@extends('layouts.app')
@section('content')
<main id="index-admin">
  <div class="container">
    <div class="row ">

      @foreach(Auth::user()->apartments as $apartment)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="apartments d-flex flex-wrap">
          <a href="{{route('admin.apartments.show', ['apartment'=> $apartment->id])}}" class="card-link">
            <div class="card" style="width: 18rem;">
              <div class="card-img-top my-card-img-top">
                <img src="{{asset($apartment->img)}}" alt="">
              </div>
              <div class="card-body my-card-body">
                <h5 class="card-title my-card-title">{{$apartment->title}}</h5>
                <div class="card-text my-card-text">
                  <p class="address">Indirizzo: {{$apartment->address}}</p>
                  <p><span class="rooms">Stanze: {{$apartment->n_rooms}}</span> <span class="beds">Letti: {{$apartment->n_beds}}</span></p>
                  <div class="actions">
                    <div class="links">
                      <a href="{{route('admin.apartments.edit', ['apartment'=>$apartment->id])}}" class="">Modifica</a>
                    </div>
                    <div class="links">
                      <a href="{{route('admin.message.index', ['apartment'=>$apartment->id])}}" class="">Messaggi</a>
                    </div>
                    <div class="links">
                      <a href="{{route('admin.sponsor.index', ['apartment'=>$apartment->id])}}" class="">Sponsor</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</main>

@endsection
