@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <div class="container" id="payment">
      <div class="row">
          <div class="col-md-12">             
              <div class="col-12 d-flex flex-column align-items-center">
                  <h2>TIPI DI SPONSOR</h2>
                  <form id="form2" class="d-flex" action="{{ route('admin.sponsor.store', ['apartment'=>$apartments->id]) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="apartment_id" value="{{$apartments->id}}">
                      @foreach ($sponsors as $sponsor)
                      <div class="form-check form-check-group">
                        <input name="sponsor_type" type="radio" id="sponsor_type" value="{{$sponsor->id}}" aria-labelledby="sponsor_type-help" @click="value({{$sponsor->id}})" >
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
         {{-- <form name="form" id="form1" action="{{route('admin.payment.make')}}"  method="post">
           @csrf
           @method('POST')
           <div class="form-group">
               <input type="hidden"  class="form-control" name="payment_Method_Nonce" id="nonce" placeholder="">
               <input type="hidden"  class="form-control" name="sponsor" id="sponsor" :value="selected">
               <input type="hidden"  class="form-control" name="apartment_id" id="apartment_id" value="{{$apartments->id}}">
 
           </div>
            <button type="submit" class="btn btn-success" id="submit-button"> Conferma e attiva lo sponsor </button>
           </form> --}}

           <form name="form" id="form1" @submit.prevent="postResult">
            <div class="form-group">
                <input type="hidden" class="form-control" id="nonce" v-model="form.payment_Method_Nonce">
                
            </div>
             
            <button class="btn btn-success" > Sponsorizza </button>
            </form>
            <button class="btn btn-success" id="submit-button"> Conferma </button>
           
        </div>
      </div>
    </div> 
@endsection
