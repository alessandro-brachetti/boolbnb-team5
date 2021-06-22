@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">             
                <div class="col-5">
                    <h2>TIPI DI SPONSOR</h2>
                    <form action="{{ route('admin.sponsor.store', ['apartment'=>$apartments->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <input type="hidden" name="apartment_id" value="{{$apartments->id}}">
                    @foreach ($sponsors as $sponsor)
                    <div class="form-check form-check-group">
                      <input name="sponsor_type" type="radio" id="sponsor_type" value="{{$sponsor->id}}" aria-labelledby="sponsor_type-help">
                      <label for="sponsor_type">{{$sponsor->name}}</label>
                      <small id="sponsor_type-help" class="form-text">
                          <p>Prezzo: {{$sponsor->price}} euro</p>
                          <p>Durata: {{$sponsor->duration}} ore</p>
                      </small>
                    </div>
                    @endforeach                   
                    <button class="btn btn-primary" type="submit" name="button">Sgancia i MONEY</button>
                    </form>
                </div>          
            </div>
        </div>
    </div>
@endsection