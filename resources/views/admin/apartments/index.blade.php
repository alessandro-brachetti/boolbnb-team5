@extends('layouts.app')
@section('content')
<main id="index-admin">
  <!-- searchbar -->
  <div class="search">
    <div class="container">
      <div class="row justify-content-right">
        <div class="searchbar col-lg-3 offset-lg-9" id="welcome">
          <input id="searchInput" type="search" placeholder="Dove vuoi andare?" aria-label="Search" v-model="search" @input="responseApi">
          {{-- <a class="btn btn-outline-success my-2 my-sm-0" :href="(search != '' ? `/search/${search}` : '#')">Search</a> --}}
          <div class="">
            <ul>
              <a v-cloak :href="(search != '' ? `/search/${search}` : '#')"><li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">@{{result.address.freeformAddress}}</li></a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="info row mpt-30">
      <div class="col-lg-6">
        <h4 class="title-admin">I tuoi annunci:</h4>
      </div>
      <div class="dashboard col-lg-6 text-right">
        <!-- <a href="{{route('dashboard')}}"><button type="button" name="button" class="white-btn">Torna alla dashboard</button></a> -->

      </div>
    </div>
    <div class="apartments row mpt-30">
      @foreach(Auth::user()->apartments as $apartment)

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="d-flex flex-wrap justify-content-center">
          <a href="{{route('admin.apartments.show', ['apartment'=> $apartment->id])}}">
            <div class="card my-card mmb-30" title="Vedi i dettagli dell'appartamento">
              <div class="card-img-top my-card-img-top">
                <div class="cover" style="background-image: url('{{asset($apartment->img)}}')">
                </div>
              </div>
              <div class="card-body my-card-body">
                <h5 class="card-title my-card-title">{{$apartment->title}}</h5>
                <div class="card-text my-card-text">
                  <p class="address">Indirizzo: <span class="via">{{$apartment->address}}</span> </p>
                  <p class="beds-rooms mpt-10"><span class="rooms">Stanze: {{$apartment->n_rooms}}</span> <span class="circle">&#183;</span> <span class="beds">Letti: {{$apartment->n_beds}}</span></p>

                  <!-- azioni admin -->
                  <div class="actions mpt-30">
                    <div class="links col-4 text-center">
                      <a href="{{route('admin.apartments.edit', ['apartment'=>$apartment->id])}}" title="Modifica"><i class="fas fa-edit"></i></a>
                    </div>
                    <div class="links col-4 text-center">
                      <a href="{{route('admin.message.index', ['apartment'=>$apartment->id])}}" title="Messaggi"><i class="fas fa-envelope-open-text"></i></a>
                    </div>
                    <div class="links col-4 text-center">
                      <a href="{{route('admin.sponsor.index', ['apartment'=>$apartment->id])}}" title="Sponsorizza"><i class="fas fa-search-dollar"></i></a>
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
