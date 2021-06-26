@extends('layouts.app')
@section('content')


<style>

    #map { width: 100%; height: 50vh; }

    #marker::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
    font-size: 2em;
}
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

var map = tt.map({
key: API_KEY,
container: 'map',
center: [13.33374, 38.12759],
zoom: 12, 
});


    search();

function search(){
    map = tt.map({
    key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
    container: 'map',
    center: [12.0809380292276, 42.744388161339],
    zoom: 12, 
})
};

    var element = document.createElement('div');
    element.id = 'marker';
    var marker = new tt.Marker({element: element}).setLngLat([12.0809380292276, 42.744388161339]).addTo(map);

    

</script>
@endsection
