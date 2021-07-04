@extends('layouts.app')

@section('content')
<main id="dashboard">

  <!-- searchbar -->
  <div class="search">
    <div class="container">
      <div class="row justify-content-right">
        <div id="welcome" class=" searchbar col-lg-4 offset-lg-4 col-md-6">
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
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h5 class="title-admin user">
          Ciao, {{ Auth::user()->name }}
        </h5>
      </div>
        <!-- <div class="col-md-8">
            <div class="card"> -->
                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div> -->
            <!-- </div>
        </div> -->
    </div>
    <div class="content row mpt-30">
      <div class="tools col-lg-3 col-md-12 col-sm-12 d-flex flex-wrap">
          <div class="card my-card mmb-15">
            <a href="{{route('admin.apartments.index')}}">
              <div class="card-body">
                <p class="card-text my-card-text"> <i class="far fa-list-alt"></i>Gestisci gli annunci</p>
              </div>
            </a>
          </div>

          <div class="card my-card mmb-15">
            <a href="{{route('admin.apartments.create')}}">
              <div class="card-body">
                <p class="card-text my-card-text"> <i class="far fa-plus-square"></i>Crea un annuncio</p>
              </div>
            </a>
          </div>
          <div class="card my-card mmb-15">
            <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
            <div class="card-body">
               <p class="card-text my-card-text">
                 <i class="fas fa-arrow-circle-left"></i>  {{ __('Logout') }}</p>
            </div>

            </a>
          </div>

      </div>

      <div class="totals col-lg-3 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-15">
          <div class="card-body my-card-body">
            <div class="title">
              <p class="number">{{count(Auth::user()->apartments)}}</p>
              <p class="card-text my-card-text">Annunci</p>
            </div>
            <div class="icon">
              <i class="fas fa-bullhorn"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="totals col-lg-3 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-15">
          <div class="card-body my-card-body">
            <div class="title">
                @php($count=0)
                @foreach(Auth::user()->apartments as $apartment)
                @foreach($apartment->messages as $key => $message)
                @php($count++)
                @endforeach
                @endforeach
                <p class="number">{{$count}}</p>
                <p class="card-text my-card-text">Messaggi</p>
            </div>
            <div class="icon">
              <i class="far fa-envelope"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="totals col-lg-3 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-15">
          <div class="card-body my-card-body">
            <div class="title">
                @php($count=0)
                @foreach(Auth::user()->apartments as $apartment)
                @foreach($apartment->views as $key => $view)
                @php($count++)
                @endforeach
                @endforeach
                <p class="number">{{$count}}</p>
              </p>
              <p class="card-text my-card-text">Visualizzazioni</p>
            </div>
            <div class="icon">
              <i class="far fa-eye"></i>
            </div>
          </div>
        </div>
      </div>

        <!-- <div class="apartments row">
        @foreach ($apartments as $apartment)
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card my-card mmb-30" style="width: 21rem;" title="Vedi i dettagli dell'appartamento">
                <div class="card-img-top my-card-img-top">
                  <img class="card-img-top" src="{{asset($apartment->img)}}" alt="Card image cap">
                </div>
                <div class="card-body my-card-body">
                  <h5 class="card-title my-card-title">{{$apartment->title}}</h5>
                  <div class="card-text my-card-text">
                    <p class="address mpt-10">Indirizzo: {{$apartment->address}}</p>
                    @foreach ($apartment->sponsors as $sponsor)
                    @if ($loop->first)
                      <p class="expiration"> <span>Fino al:</span> {!! date('d/m/Y h:m:s', strtotime($sponsor->pivot->expiration_date)) !!} </p>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div> -->

    </div>

    <div class="row sponsors">
      <div class="col-lg-9 col-md-12 col-sm-12 offset-lg-3">
        <div class="card my-card">
          <div class="my-card-body">
            <table class="table table-borderless my-table">
              <thead>
                <tr>
                  <th scope="col" col-span=2>Alloggio</th>
                  <th scope="col">Scadenza promozione</th>
                </tr>
              </thead>
              <tbody>
                @foreach($apartments as $apartment)
                  @foreach($apartment->sponsors as $sponsor)
                <tr>
                  <td style="width: 70%;">{{$apartment->title}}</td>
                  @if ($loop->first)
                  <td> {!! date('d/m/Y h:m:s', strtotime($sponsor->pivot->expiration_date)) !!} </td>
                    @endif
                    @endforeach
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
@endsection
