@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Crea Appartamento</h2>
      </div>
    </div>
      <div class="row justify-content-center">
          <div class="col-md-8">
            <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
  
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title') }}">
                @error('title')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="n_rooms">Numero Stanze</label>
                <input class="form-control @error('n_rooms') is-invalid @enderror" id="n_rooms" type="number" name="n_rooms" value=""{{ old('n_rooms') }}>
                @error('n_rooms')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="n_beds">Numero Letti</label>
                <input class="form-control @error('n_beds') is-invalid @enderror" id="n_beds" type="number" name="n_beds" value=""{{ old('n_beds') }}>
                @error('n_beds')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="n_bathrooms">Numero Bagni</label>
                <input class="form-control @error('n_bathrooms') is-invalid @enderror" id="n_bathrooms" type="number" name="n_bathrooms" value=""{{ old('n_bathrooms') }}>
                @error('n_bathrooms')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="mq">Metri Quadri</label>
                <input class="form-control @error('mq') is-invalid @enderror" id="mq" type="number" name="mq" value=""{{ old('mq') }}>
                @error('mq')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="address">Indirizzo</label>
                <input class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{ old('address') }}">
                @error('address')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="latitude">Latitudine</label>
                <input class="form-control @error('latitude') is-invalid @enderror" id="latitude" type="number" step="any" name="latitude" value=""{{ old('latitude') }}>
                @error('latitude')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="longitude">Longitudine</label>
                <input class="form-control @error('longitude') is-invalid @enderror" id="longitude" type="number" step="any" name="longitude" value=""{{ old('longitude') }}>
                @error('longitude')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="img">Immagine</label>
                <input class="form-control-file @error('img') is-invalid @enderror" id="img" type="file" name="img" value="">
                @error('img')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="visible">Visibile</label>
                <select class="form-control @error('visible') is-invalid @enderror" id="visible" name="visible">               
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
                @error('visible')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>
  
              <button class="btn btn-primary" type="submit" name="button">Salva</button>
            </form>
          </div>
      </div>
    </div>
@endsection