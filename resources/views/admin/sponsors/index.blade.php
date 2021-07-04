@extends('layouts.app')
@section('content')
<main id="index-sponsors">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

</div>
  <!-- searchbar -->
  <div class="search">
    <div class="container">
      <div class="row justify-content-right">
        <div class="searchbar col-lg-3 offset-lg-9" id="welcome">
          <input id="searchInput" type="search" placeholder="Dove vuoi andare?" aria-label="Search" v-model="search" @input="responseApi">
          {{-- <a class="btn btn-outline-success my-2 my-sm-0" :href="(search != '' ? `/search/${search}` : '#')">Search</a> --}}
          <div class="">
            <ul>
              <a v-cloak :href="(search != '' ? `/search/${search}` : '#')"><li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">@{{result.address.freeformAddress}}</li></a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container" id="payment">
    <div class="sponsors row mpt-30">

      <h5 class="title-admin">Sponsorizza il tuo annuncio</h5>

    </div>
    <div class="row justify-content-center mmt-30">
      @foreach ($sponsors as $sponsor)
      <div class="totals col-lg-4 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-20">
          <div class="card-body my-card-body">
            <input name="sponsor_type" type="radio" id="sponsor_type" value="{{$sponsor->id}}" aria-labelledby="sponsor_type-help" @input="value({{$sponsor->id}})" @click="startPayment">
                <label for="sponsor_type">{{$sponsor->name}}</label>
                <small id="sponsor_type-help" class="form-text">
                <p>Prezzo: {{$sponsor->price}} euro</p>
                <p>Durata: {{$sponsor->duration}} ore</p>
            </small>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row">
      <div class="col-12 d-flex flex-column align-items-center">
        <div id="dropin-container"></div>
         <form name="form" id="form1" @submit.prevent="postResult({{$apartments->id}})">
          <div class="form-group">
              <input type="hidden" class="form-control" id="nonce" v-model="form.payment_Method_Nonce">
          </div>

          <button v-if="clicked == true" class="btn btn-success"> Sponsorizza </button>
          </form>
          <button v-if="clicked == false" class="btn" id="submit-button" @click="clicked = true"> Conferma </button>

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
                    Hai sponsorizzato il tuo appartamento con successo!
                  </div>
                  <div class="modal-footer">
                    <a href="/dashboard" class="btn btn-secondary">Ok</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</main>
@endsection
