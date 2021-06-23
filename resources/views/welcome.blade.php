@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="apartments d-flex flex-wrap">
            @foreach($apartments as $apartment)
                <div class="col-sm">
                    <form id='{{$apartment->id}}' action="{{route('views.store', ['apartment'=>$apartment->id])}}" method="post">
                        @csrf
                        @method('POST')
                        
                        <div class="form-group">
                            <input type="hidden" name="apartment_id" value="{{$apartment->id}}">       
                        </div>


                        <div class="card" style="width: 18rem;" onclick="event.preventDefault(); document.getElementById('{{$apartment->id}}').submit()">
                            <div class="card-img-top" style="background: url({{asset($apartment->img)}}); height: 14rem; background-size: cover;"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{$apartment->title}}</h5>
                                <p class="card-text">Indirizzo: {{$apartment->address}}</p>
                            </div>                       
                        </div>
                    </form>                  
                </div>
            @endforeach
        </div>
    </div>
</div>
  
@endsection
