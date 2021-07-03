@extends('layouts.app')
@section('content')
<main id="create">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="title">Crea Appartamento</h2>
        </div>
      </div>
        <div  class="row justify-content-center">
            <div class="col-md-8">
              <form action="{{ route('admin.apartments.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                  <label for="title">Titolo</label>
                  <input class="form-control @error('title') is-invalid @enderror" id="titolo" type="text" name="title" value="{{ old('title') }}">
                  @error('title')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="n_rooms">Numero Stanze</label>
                  <input class="form-control @error('n_rooms') is-invalid @enderror" id="n_rooms" type="number" name="n_rooms" value="{{ old('n_rooms') }}">
                  @error('n_rooms')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="n_beds">Numero Letti</label>
                  <input class="form-control @error('n_beds') is-invalid @enderror" id="n_beds" type="number" name="n_beds" value="{{ old('n_beds') }}">
                  @error('n_beds')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="n_bathrooms">Numero Bagni</label>
                  <input class="form-control @error('n_bathrooms') is-invalid @enderror" id="n_bathrooms" type="number" name="n_bathrooms" value="{{ old('n_bathrooms') }}">
                  @error('n_bathrooms')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="mq">Metri Quadri</label>
                  <input class="form-control @error('mq') is-invalid @enderror" id="mq" type="number" name="mq" value="{{ old('mq') }}">
                  @error('mq')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>
              <div id="root">
                <div class="form-group">
                  <label for="address">Indirizzo</label>

                    <input v-model="search" class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" @input="responseApi">
                    <ul class="results">
                      <li v-for="result in results" @click="getCords(result.position.lat, result.position.lon)">@{{result.address.freeformAddress}}</li>
                    </ul>

                  @error('address')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  {{-- <label for="latitude">Latitudine</label> --}}
                  <input class="form-control @error('latitude') is-invalid @enderror" id="latitude" type="number" step="any" name="latitude" :value="lat">
                  @error('latitude')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  {{-- <label for="longitude">Longitudine</label> --}}
                  <input class="form-control @error('longitude') is-invalid @enderror" id="longitude" type="number" step="any" name="longitude" :value="lon">
                  @error('longitude')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>
              </div>

                <div class="form-group">
                  <label for="img">Immagine</label>
                  <input class="form-control-file @error('img') is-invalid @enderror" id="img" type="file" name="img" value="{{old('img')}}">
                  @error('img')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <p>Servizi</p>
                  @foreach ($services as $service)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" @error('services') is-invalid @enderror" id="services" type="checkbox" name="service_ids[]" value="{{$service->id}}">
                  <label class="form-check-label" for="services">{{$service->service_name}}</label>
                  </div>
                  @endforeach
                  @error('services')
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
</main>
@endsection
