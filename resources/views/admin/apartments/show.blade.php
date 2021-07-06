@extends('layouts.app')
@section('content')
<main id="show">
    <div class="container-fluid">
        <div class="container">
            <div class="row mpt-30 align-items-center">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{route('admin.apartments.edit', ['apartment'=>$apartment->id])}}" class="card-link"><button class="btn my-btn">Modifica</button></a>
                    <a href="{{route('admin.message.index', ['apartment'=>$apartment->id])}}" class="card-link"><button class="btn my-btn">Messaggi</button></a>
                    <a href="{{route('admin.sponsor.index', ['apartment'=>$apartment->id])}}" class="card-link"><button class="btn my-btn">Sponsor</button></a>    
                </div>
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
                    <div class="card my-card c-card">
                        <img class="icon" src="/icons/views.svg" alt="" width="25px" height="25px"><p>Visualizzazioni totali: {{count($apartment->views)}}</p>
                    </div>
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
            <div class="bold mmt-20">Posizione</div>
            <div class="row justify-content-center mmt-20 mmb-30">
                <div class="col-md-12">
                    <div id="map"></div>
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
