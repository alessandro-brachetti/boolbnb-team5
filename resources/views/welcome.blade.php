@extends('layouts.app')
@section('content')


<style>

    #map-div { width: 100%; height: 50vh; }
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
            <div id="map-div"></div>
        </div>
        
    </div>

</div>

<script>
const API_KEY = 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL';
const APPLICATION_NAME = 'My Application';
const APPLICATION_VERSION = '1.0';
const GOLDEN_GATE_BRIDGE = {lng: 38.12451, lat: 13.33526};
tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);


var map = tt.map({
key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
container: 'map-div',
center: GOLDEN_GATE_BRIDGE,
zoom: 13,
    
});

// map.addControl(new tt.NavigationControl());
// var geolocateControl = new tt.GeolocateControl({
//     positionOptions: {
//         enableHighAccuracy: false
//     }
// });

tt.services.fuzzySearch({
  key: API_KEY,
  query: 'via domenico lancia di brolo 167'
})
.go()
.then(function(response) {
  map = tt.map({
	key: API_KEY,
	container: 'map-div',
	center: response.results[0].position,
	zoom: 12

    
  });

});
    
</script>
@endsection
