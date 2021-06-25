@extends('layouts.app')
@section('content')


<style>

    #map { width: 100%; height: 50vh; }
  </style>
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
    
    <div class="row">
        <div class="col-8">
            <div id="map"></div>
        </div>
        
    </div>

</div>

<script>
const API_KEY = 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL';
// const APPLICATION_NAME = 'My Application';
// const APPLICATION_VERSION = '1.0';

// tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);

// const GOLDEN_GATE_BRIDGE = {lng: -122.47483, lat: 37.80776};

var map = tt.map({
key: API_KEY,
container: 'map',
center: [13.33374, 38.12759],
zoom: 12, 
});

   
    // tt.setProductInfo('My Application', '1.0');
    //   var map = tt.map({
    //       key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
    //       container: 'map',
    //       center: GOLDEN_GATE_BRIDGE,
    //       zoom: 12, 
    //   });


    search();

      function search(){
          map = tt.map({
          key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
          container: 'map',
          center: [12.0809380292276, 42.744388161339],
          zoom: 12, 
      })
    };

    var marker = new tt.Marker().setLngLat([12.0809380292276, 42.744388161339]).addTo(map);

</script>
@endsection
