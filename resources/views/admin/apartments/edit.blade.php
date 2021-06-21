@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>
      <div class="row justify-content-center">
          <div class="col-md-8">
            <form action="{{ route('admin.apartments.update', ['apartment'=>$apartment->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title', $apartment->title) }}">
                @error('titolo')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="n_rooms">Numero Stanze</label>
                <input class="form-control @error('n_rooms') is-invalid @enderror" id="n_rooms" type="number" name="n_rooms" value="{{ old('n_rooms', $apartment->n_rooms) }}">
                @error('numero stanze')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="n_beds">Numero Letti</label>
                <input class="form-control @error('n_beds') is-invalid @enderror" id="n_beds" type="number" name="n_beds" value="{{ old('n_beds', $apartment->n_beds) }}">
                @error('numero letti')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="n_bathrooms">Numero Bagni</label>
                <input class="form-control @error('n_bathrooms') is-invalid @enderror" id="n_bathrooms" type="number" name="n_bathrooms" value="{{ old('n_bathrooms', $apartment->n_bathrooms) }}">
                @error('numero bagni')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="mq">Metri Quadri</label>
                <input class="form-control @error('mq') is-invalid @enderror" id="mq" type="number" name="mq" value="{{ old('mq', $apartment->mq) }}">
                @error('metri quadri')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="address">Indirizzo</label>
                <input class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{ old('address', $apartment->address) }}">
                @error('indirizzo')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="latitude">Latitudine</label>
                <input class="form-control @error('latitude') is-invalid @enderror" id="latitude" type="number" step="any" max="100" name="latitude" value="{{ old('latitude', $apartment->latitude) }}">
                @error('latitudine')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="longitude">Longitudine</label>
                <input class="form-control @error('longitude') is-invalid @enderror" id="longitude" type="number" step="any" max="100" name="longitude" value="{{ old('longitude', $apartment->longitude) }}">
                @error('longitudine')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
              <img src="{{asset($apartment->img)}}" class="img-fluid img-thumbnail" alt="{{$apartment->title}}">
              <div class="form-group">
                <label for="img">Immagine</label>
                
                <input class="form-control-file @error('img') is-invalid @enderror" id="img" type="file"  name="img" value="">
                @error('immagine')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="visible">Visibile</label>
                <select class="form-control @error('visible') is-invalid @enderror" id="visible" name="visible">               
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
                @error('visibile')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <button class="btn btn-primary" type="submit" name="button">Salva</button>
            </form>
          </div>
      </div>
    </div>
@endsection