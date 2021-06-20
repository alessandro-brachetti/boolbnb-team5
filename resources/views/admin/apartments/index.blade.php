@extends('layouts.app')
@section('content')
    <div class="apartments">
    @foreach($apartments as $apartment)
    <img src="{{$apartment->img}}" alt="">
    @endforeach
  </div>
@endsection