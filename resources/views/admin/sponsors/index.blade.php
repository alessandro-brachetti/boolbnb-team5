@extends('layouts.app')
@section('content')
<main id="index-sponsors">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
  <div class="container mpb-50">
    <div class="sponsors row mpt-50 text-center">
      <div class="col-12">
        <h1 class="title-admin">Sponsorizza il tuo annuncio</h1>
        <p>Raggiungi più clienti mettendo il tuo alloggio in evidenza</p>
      </div>
    </div>
  </div>

  <div class="container-fluid greycontainer mpt-30">
    <div class="container" id="payment" v-cloak>

      <div class="row justify-content-center mmt-30">
        @foreach ($sponsors as $sponsor)
        <div class="totals col-lg-4 col-md-12 col-sm-12 d-flex flex-wrap">
          <div class="card my-card mmb-20">
            <div class="card-body my-card-body">
                  <div class="row justify-content-center">
                    <div class="col-12 text-center">
                      <input name="sponsor_type" type="radio" id="sponsor_type" value="{{$sponsor->id}}" aria-labelledby="sponsor_type-help" @input="value({{$sponsor->id}})" @click="startPayment">
                      <label for="sponsor_type">{{$sponsor->name}}</label>
                      <small id="sponsor_type-help" class="form-text">
                    </div>
                  </div>
                  <div class="col-12 text-center">
                    <p class="info"> Prezzo: {{$sponsor->price}} euro</p>
                    <p class="info"> Durata: {{$sponsor->duration}} ore</p>
                  </small>
                  </div>
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

            <button v-if="clicked == true" class="btn my-btn"> Sponsorizza </button>
            </form>
            <button v-if="clicked == false && selected != ''" class="btn my-btn" id="submit-button" @click="clicked = true"> Conferma </button>

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
                      <a href="/dashboard" class="btn my-btn">Ok</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
