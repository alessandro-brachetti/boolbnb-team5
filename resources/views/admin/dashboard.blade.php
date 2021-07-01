@extends('layouts.app')

@section('content')
{{-- {{dd($apartments)}} --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a href="{{route('admin.apartments.index')}}">I tuoi appartamenti</a>
            <a href="{{route('admin.apartments.create')}}">Aggiungi appartamento</a>          
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ciao {{ Auth::user()->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> 
    @foreach ($apartments as $apartment)
    {{-- {{dd($apartment)}} --}}
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title my-card-title">{{$apartment->title}}</h5>
                    <img src="{{asset($apartment->img)}}" alt="" class="rounded float-left" style="height:50px;">
                    @foreach ($apartment->sponsors as $sponsor)
                    @if ($loop->first) Data scadenza sponsor:
                        <p> {!! date('d/m/Y h:m:s', strtotime($sponsor->pivot->expiration_date)) !!} </p>             
                    @endif               
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
    @endforeach 
</div>
@endsection
