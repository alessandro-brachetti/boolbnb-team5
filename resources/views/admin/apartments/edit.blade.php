@extends('layouts.app')
@section('content')
<main id="edit"> 
  <div class="container title text-center mpt-20 mpb-20">
    <div class="row mpt-30">
      <div class="col-md-12">
        <h1 class="title-admin">Modifica il tuo appartamento</h1>
        <p>Rendi il tuo appartamento più interessante</p>
      </div>
    </div>
  </div>
  <div class="container-fluid content mpt-20 mpb-20">
    <div class="container">
      <form action="{{ route('admin.apartments.update', ['apartment'=>$apartment->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mpb-20">
          <div class="col-md-12 d-flex justify-content-center image">
            <img src="{{asset($apartment->img)}}" class="img-fluid img-thumbnail" alt="{{$apartment->title}}">
          </div>
        </div>
        <div class="row d-flex justify-content-center mmb-20">
          

          <div class="col-md-4">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group">
              <label for="title" class="bold">Titolo</label>
              <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title', $apartment->title) }}">
              @error('title')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div v-cloak id="root">
              <div class="form-group">
                <label for="address" class="bold">Indirizzo</label>

                  <input v-model="search" class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" placeholder="Clicca per recuperare l'indirizzo" @input="responseApi" @click="getAddress('{{$apartment->address}}','{{$apartment->longitude}}','{{$apartment->latitude}}')">
                  <ul class="results">
                    <li v-for="result in results" @click="getCords(result.position.lat, result.position.lon), search=result.address.freeformAddress">@{{result.address.freeformAddress}}</li>
                  </ul>

                @error('address')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <input class="form-control @error('latitude') is-invalid @enderror" id="latitude" type="hidden" step="any" name="latitude" :value="lat">
              </div>

              <div class="form-group">
                <input class="form-control @error('longitude') is-invalid @enderror" id="longitude" type="hidden" step="any" name="longitude" :value="lon">
              </div>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center mmb-10">
          <div class="col-md-2">
            <div class="form-group">
              <label for="n_rooms" class="bold">Numero Stanze</label>
              <input class="form-control @error('n_rooms') is-invalid @enderror" id="n_rooms" type="number" name="n_rooms" value="{{ old('n_rooms', $apartment->n_rooms) }}">
              @error('n_rooms')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="n_beds" class="bold">Numero Letti</label>
              <input class="form-control @error('n_beds') is-invalid @enderror" id="n_beds" type="number" name="n_beds" value="{{ old('n_beds', $apartment->n_beds) }}">
              @error('n_beds')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="n_bathrooms" class="bold">Numero Bagni</label>
              <input class="form-control @error('n_bathrooms') is-invalid @enderror" id="n_bathrooms" type="number" name="n_bathrooms" value="{{ old('n_bathrooms', $apartment->n_bathrooms) }}">
              @error('n_bathrooms')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="mq" class="bold">Metri Quadri</label>
              <input class="form-control @error('mq') is-invalid @enderror" id="mq" type="number" name="mq" value="{{ old('mq', $apartment->mq) }}">
              @error('mq')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center mmb-10">
          <div class="col-md-8 col-sm-12">
            <div class="form-group">
              <p class="bold">Servizi</p>
              <div class="d-flex justify-content-center flex-wrap">
                @foreach ($services as $key => $service)
                <div class="form-check child">
                  <input class="form-check-input" @error('services') is-invalid @enderror" id="{{$service->service_name}}" type="checkbox" name="service_ids[]" value=" {{$service->id}}" {{ $apartment->services->contains($service) ?  'checked' : '' }}>
                <label class="form-check-label" for="services"><span><img class="icon" src="/icons/{{$service->service_name}}.svg" alt=""></span><span>{{$service->service_name}}</span></label>
                </div>
                @endforeach
                @error('services')
                  <small class="text-danger"> {{ $message }}</small>
                @enderror
              </div>      
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center mmb-10">
          <div class="col-md-8 col-sm-12">
            <div class="form-group">
              <label for="description" class="bold">Descrizione</label>
              <textarea class="form-control" @error('description') is-invalid @enderror id="exampleFormControlTextarea3" name="description" rows="7">{{$apartment->description}}</textarea>
              @error('description')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
        </div>
        <div class="row d-flex justify-space-between last mmb-10">
          <div class="col-md-3 offset-md-2">
            <div class="form-group">
              <label for="img" class="bold">Immagine</label>
              <input class="form-control-file @error('img') is-invalid @enderror" id="img" type="file" name="img" value="{{old('img')}}">
              @error('img')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div> 
          <div class="col-md-2 offset-md-3">
            <div class="form-group">
              <label for="visible" class="bold">Visibile</label>
              <select class="form-control w-half @error('visible') is-invalid @enderror" id="visible" name="visible">
                  <option value="1">SI</option>
                  <option value="0">NO</option>
              </select>
              @error('visible')
                <small class="text-danger"> {{ $message }}</small>
              @enderror
            </div>
          </div>
        </div>
        <div class="row text-center mpt-30">
          <div class="col-md-12">
            <button class="btn orange" type="submit" name="button">Salva</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>  
</main>
@endsection
