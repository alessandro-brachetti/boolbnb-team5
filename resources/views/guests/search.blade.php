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
        <span>@{{range}}</span>
        <input type="range" v-model='range' name="" id="" min="15" max="100" @input="onRangeChange">
        <span>100</span>
    </div>
</div>

<style>
    #map { width: 100%; height: 50vh; }

    .marker::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\f3c5";
    font-size: 2em;
    }
    .marker2::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
    font-size: 2em;
    } 

    input {
    margin: .4rem;
}
  </style>
@endsection
