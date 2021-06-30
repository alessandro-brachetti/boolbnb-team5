@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <div class="container" id="payment">
      <div class="row">
          <div class="col-md-12">             
              <div class="col-12 d-flex flex-column align-items-center">
                  <h2>TIPI DI SPONSOR</h2>
                      @foreach ($sponsors as $sponsor)
                      <div class="form-check form-check-group">
                        <input name="sponsor_type" type="radio" id="sponsor_type" value="{{$sponsor->id}}" aria-labelledby="sponsor_type-help" @input="value({{$sponsor->id}})" @click="startPayment">
                        <label for="sponsor_type">{{$sponsor->name}}</label>
                        <small id="sponsor_type-help" class="form-text">
                            <p>Prezzo: {{$sponsor->price}} euro</p>
                            <p>Durata: {{$sponsor->duration}} ore</p>
                        </small>
                      </div>
                  @endforeach                                
              </div>          
          </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">
          <div id="dropin-container"></div>
           <form name="form" id="form1" @submit.prevent="postResult({{$apartments->id}})">
            <div class="form-group">
                <input type="hidden" class="form-control" id="nonce" v-model="form.payment_Method_Nonce">
                
            </div>
             
            <button v-if="clicked == true" class="btn btn-success" > Sponsorizza </button>
            </form>
            <button v-if="clicked == false" class="btn btn-success" id="submit-button" @click="clicked = true"> Conferma </button>
           
        </div>
      </div>
    </div> 
@endsection
