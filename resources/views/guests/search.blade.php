@extends('layouts.app')
@section('content')

<div class="container" id="search">
    <div class="row">
        <div class="col-6">
            <ul>
              <li v-for="result in results"><a :href="`/guests/${result.id}`">@{{result.title}}</a></li>
            </ul>
        </div>
        <div class="col-6">
            <div id="map"></div>
        </div>
    </div>
</div>

<style>
    #map { width: 100%; height: 50vh; }

    #marker::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
    font-size: 2em;
    }
  </style>
@endsection
