@extends('layouts.app')
@section('content')
<main id="g_show">
  <div class="container-fluid">
    <div class="container">
      <div class="row mpt-30">
        <div class="col-md-8">
          <h3 class="card-title">{{$apartment->title}}</h3>
        </div>
        <div class="col-md-8">
          <h5 class="card-title"><span><img class="icon" src="/icons/Posizione.svg" alt="" width="25px" height="25px"></span> {{$apartment->address}}</h5>
          <input type="hidden" value="{{$apartment->longitude}}" id="long">
          <input type="hidden" value="{{$apartment->latitude}}" id="lat">
        </div>
      </div>
      <div class="row d-flex align-items-center">
        <div class="col-md-12 ar">
          <div class="cover" style="background-image: url('{{asset($apartment->img)}}')"></div>
        </div>
      </div>
      <div class="row d-flex mmt-30">
        <div class="col-md-4 child mmb-10">
            <div class="c-card card my-card"><span><img class="icon" src="/icons/stanze.svg" alt="" width="25px" height="25px"></span> Stanze: {{$apartment->n_rooms}}</div>
        </div>
        <div class="col-md-4 child mmb-10">
            <div class="c-card card my-card"><span><img class="icon" src="/icons/bagni.svg" alt="" width="25px" height="25px"></span> Bagni: {{$apartment->n_bathrooms}}</div>

        </div>
        <div class="col-md-4 child mmb-10">
            <div class="c-card card my-card"><span><img class="icon" src="/icons/letti.svg" alt="" width="25px" height="25px"></span> Letti: {{$apartment->n_beds}}</div>

        </div>
        <div class="col-md-4 child mmb-10">
            <div class="c-card card my-card"><span><img class="icon" src="/icons/meter.svg" alt="" width="25px" height="25px"></span> Mq: {{$apartment->mq}}</div>
        </div>
        <div class="col-md-4 child mmb-10">
          <div class="c-card card my-card"><span><img class="icon" src="/icons/views.svg" alt="" width="25px" height="25px"></span>Visualizzazioni totali: {{count($apartment->views)}}</div>
        </div>
    </div>
    <div class="row mmt-30 mmb-30">
      <div class="col-md-9">
          <div class="bold">Descrizione </div>
          <p>{{$apartment->description}}</p>
      </div>
    </div>
    <div class="bold">Servizi</div>
    <div class="row d-flex mmt-30">
        @foreach($apartment->services as $service)
        <div class="col-md-4 child mmb-15">
            <img class="icon" src="/icons/Check.svg" alt="" width="15px" height="15px" style="margin-right: 10px;"><span class="ml-10">{{$service->service_name}}</span>
        </div>
        @endforeach
    </div>
    <div class="bold mmt-20">Dove ti troverai</div>
    <div class="row justify-content-center mmt-20 mmb-30">
      <div class="col-12">
        <div id="map"></div>
      </div>
    </div>
  <div class="row d-flex justify-content-center">
    <div class="col-md-6">
      <div class="card-body">
        @if (!Auth::user() || Auth::user()->id != $apartment->user_id)
          <h4 class="text-center">Contatta l'host dell'appartamento</h4>
              <form action="{{ route('messages.store') }}" method="post" name="form">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
                  <div class="form-group">
                    <label for="name">Nome</label>
                    <input class="form-control @error('title') is-invalid @enderror" id="name" type="text" name="name" value="{{Auth::user() ? Auth::user()->name : ""}}">
                    @error('nome')
                      <small class="text-danger"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="lastname">Cognome</label>
                    <input class="form-control @error('lastname') is-invalid @enderror" id="lastname" type="text" name="lastname" value="{{Auth::user() ? Auth::user()->lastname : ""}}">
                    @error('cognome')
                      <small class="text-danger"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{Auth::user() ? Auth::user()->email : ""}}">
                    @error('email')
                      <small class="text-danger"> {{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="message">Messaggio</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" value=""></textarea>
                    @error('messaggio')
                      <small class="text-danger"> {{ $message }}</small>
                    @enderror
                  </div>
                  <div class="message-button text-center">
                    <button class="btn my-btn" type="button" name="button" data-toggle="modal" data-target="#exampleModal">Invia</button>

                  </div>

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Congratulazioni!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Hai inviato il messaggio con successo!
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn my-btn" data-dismiss="modal" onclick="submit()">Ok</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            @endif
      </div>
    </div>
  </div>

  </div>


  </div>
  </div>
</main>

<style>
  #map { width: 100%; height: 50vh; }
  #marker::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
    font-size: 1.5em;
    color: #fa6933;
    background-color: rgb(255, 255, 255);
    padding: .35em;
    border-radius: 50%;
    box-shadow: 10px 10px 15px -2px rgba(0,0,0,0.51);
  }
</style>
<script>
  function submit() {
    form.submit();
  }

  const API_KEY = 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL';
  let long = document.getElementById('long').value;
  let lat = document.getElementById('lat').value;

  var map = tt.map({
      key: API_KEY,
      container: 'map',
      center: [long, lat],
      zoom: 14,
      });

  var element = document.createElement('div');
  element.id = 'marker';
  var marker = new tt.Marker({element: element}).setLngLat([long, lat]).addTo(map);
</script>
@endsection
