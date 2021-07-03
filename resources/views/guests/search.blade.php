@extends('layouts.app')
@section('content')

<div class="container-fluid" id="search">
    <div class="row">
        <div class="col-6">
            <div>
                <label for="points">Numero minimo stanze:</label>
                <input type="number" id="points" name="points" min="1" max="20" v-model="filter.rooms">
            </div>
            
            <div>
                <label for="points">Numero minimo posti letto:</label>
                <input type="number" id="points" name="points" min="1" max="20" v-model="filter.beds">
            </div>

            <div class="form-group">
                <p>Filtra per Servizi:</p>
                <div class="form-check form-check-inline" v-for="service in services">  
                  <input class="form-check-input" id="services" type="checkbox" v-model="checkedItems" :value="service">
                  <label> @{{service}} </label>
                </div>      
            </div>

            <div>
                <span>@{{range}} Km</span>
                <input type="range" v-model='range' name="" id="" min="20" max="100" @input="onRangeChange">
                <span>100 Km</span>
            </div>
            
            <div>               
                {{-- <div v-for="result in results" v-if="result.n_rooms >= filter.rooms && result.n_beds >= filter.beds">
                    <a :href="`/guests/${result.id}`">@{{result.title}}</a>   
                </div> --}}
                <div v-for="apartment in filteredResults" v-if="apartment.n_rooms >= filter.rooms && apartment.n_beds >= filter.beds">
                    <p>FIltrati:@{{apartment.title}}</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div id="map"></div>
        </div>       
    </div>
</div>

<style>
    #map { width: 100%; height: calc(100vh - 4.375rem); }

    #marker::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
    font-size: 2em;
    }

    input {
    margin: .4rem;
    }   
  </style>
@endsection
