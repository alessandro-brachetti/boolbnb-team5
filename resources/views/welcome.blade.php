@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="apartments d-flex flex-wrap">
            @foreach($apartments as $apartment)
                <div class="col-sm">
                    <a href="{{route('guests.show', ['apartment'=> $apartment->id])}}" class="card-link">
                        <div class="card" style="width: 18rem;">
                            <div class="card-img-top" style="background: url({{asset($apartment->img)}}); height: 14rem; background-size: cover;"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{$apartment->title}}</h5>
                                <p class="card-text">Indirizzo: {{$apartment->address}}</p>
                            </div>
                            
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
  
@endsection
