@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="{{asset($apartment->img)}}" alt="{{$apartment->title}}">
        <div class="card-body">
            <h5 class="card-title">{{$apartment->title}}</h5>
            <p class="card-text">Indirizzo: {{$apartment->address}}</p>         
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">N. Rooms: {{$apartment->n_rooms}}</li>
            <li class="list-group-item">N. Beds: {{$apartment->n_beds}}</li>
            <li class="list-group-item">N. Bathrooms: {{$apartment->n_bathrooms}}</li>
            <li class="list-group-item">MQ: {{$apartment->mq}}</li>
        </ul>
        <div class="card-body">
          Servizi:
          @foreach($apartment->services as $service)
              @if ($loop->last)
                  <span>{{$service->service_name}}</span>
              @else 
                  <span>{{$service->service_name}},</span>
              @endif
          @endforeach
      </div>
    </div>
    <div class="card-body">
      @if (!Auth::user() || Auth::user()->id != $apartment->user_id)
            <form action="{{ route('messages.store') }}" method="post" name="form">
                @csrf
                @method('POST')
                <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input class="form-control @error('title') is-invalid @enderror" id="name" type="text" name="name" value="{{Auth::user() ? Auth::user()->name : ""}}">
                  @error('nome')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>
    
                <div class="form-group">
                  <label for="lastname">Cognome</label>
                  <input class="form-control @error('lastname') is-invalid @enderror" id="lastname" type="text" name="lastname" value="{{Auth::user() ? Auth::user()->lastname : ""}}">
                  @error('cognome')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>
    
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{Auth::user() ? Auth::user()->email : ""}}">
                  @error('email')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>
    
                <div class="form-group">
                  <label for="message">Messaggio</label>
                  <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" value=""></textarea>
                  @error('messaggio')
                    <small class="text-danger"> {{ $message }}</small>
                  @enderror
                </div>
    
                <button class="btn btn-primary" type="button" name="button" data-toggle="modal" data-target="#exampleModal">Invia</button>

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
                        Hai inviato il messaggio con successo!
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit()">Ok</button>
                      </div>
                    </div>
                  </div>
                </div> 
            </form>      
          @endif
    </div>   
</div>
  
<script>
  function submit() {
    form.submit();
  }
</script>
@endsection

