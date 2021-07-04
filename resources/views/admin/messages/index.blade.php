@extends('layouts.app')
@section('content')
  <main id="index-messages">
    <!-- searchbar -->
    <div class="search">
      <div class="container">
        <div class="row justify-content-right">
          <div class="searchbar col-lg-3 offset-lg-9">
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
      <div class="row">

            @foreach ($messages as $message)
                <div class="col-md-3">
                  <div>
                      <p>Nome: {{$message->name}}</p>
                      <p>Cognome: {{$message->lastname}}</p>
                      <p>Indirizzo e-mail: {{$message->email}}</p>
                      <p>Messaggio: {{$message->message}}</p>
                  </div>
                </div>
            @endforeach

      </div>
    </div>
  </main>
@endsection
