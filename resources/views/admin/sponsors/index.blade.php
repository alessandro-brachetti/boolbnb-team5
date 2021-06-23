@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <div class="container">
      <div class="row">
          <div class="col-md-12">             
              <div class="col-12 d-flex flex-column align-items-center">
                  <h2>TIPI DI SPONSOR</h2>
                  <form id="sponsor-form" class="d-flex" action="{{ route('admin.sponsor.store', ['apartment'=>$apartments->id]) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="apartment_id" value="{{$apartments->id}}">
                      @foreach ($sponsors as $sponsor)
                      <div class="form-check form-check-group">
                        <input name="sponsor_type" type="radio" id="sponsor_type" value="{{$sponsor->id}}" aria-labelledby="sponsor_type-help">
                        <label for="sponsor_type">{{$sponsor->name}}</label>
                        <small id="sponsor_type-help" class="form-text">
                            <p>Prezzo: {{$sponsor->price}} euro</p>
                            <p>Durata: {{$sponsor->duration}} ore</p>
                        </small>
                      </div>
                  @endforeach                   
                  </form>
              </div>          
          </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">
          <div id="dropin-container"></div>
         <form name="form" action="{{route('admin.payment.make')}}"  method="post">
           @csrf
           @method('POST')
           <div class="form-group">
               <input type="hidden"  class="form-control" name="payment_Method_Nonce" id="nonce" placeholder="">
               <input type="hidden"  class="form-control" name="sponsor" id="sponsor" value="">
 
           </div>
           <button type="button" class="btn btn-success" id="submit-button"> Conferma e attiva la promo </button>
           </form>
        </div>
      </div>
    </div> 
  <script>
      
    var button = document.querySelector('#submit-button');
 
    braintree.dropin.create({
      authorization: "sandbox_38thk8rh_2y94pm5jx53r545r",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          document.querySelector('#nonce').value = payload.nonce;
          document.querySelector('#sponsor-form').submit();
        });
      });
    });
  </script>
@endsection
