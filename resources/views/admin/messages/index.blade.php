@extends('layouts.app')
@section('content')
  <main id="index-messages">

    <div class="container mpb-30">
      <div class="info row mpt-50 mpb-20 text-center">
        <div class="col-12">
          <h1 class="title-admin">I tuoi messaggi</h1>
          <p>Rimani costantemente in contatto con i tuoi futuri clienti</p>
        </div>
      </div>
    </div>
    @if(count($messages)>0)
    <div class="container-fluid greycontainer">
      <div class="container">
        <div class="messages row mpt-30">
          @foreach ($messages as $message)
          <div class="totals col-lg-6 col-md-12 d-flex flex-wrap">
            <div class="card my-card mmb-20">
              <div class="card-body my-card-body">
                <div class="info">
                  <div class="user">
                    <p class="name"><i class="far fa-user"></i>
                     <span class="title">Mittente: </span><span class="content">{{$message->name}} {{$message->lastname}}</span></p>
                  </div>
                  <div class="email">
                    <p><i class="far fa-envelope"></i> <span class="title">E-mail: </span> <span class="content">{{$message->email}}</span></p>
                  </div>
                  <div class="message">
                    <p><i class="fas fa-quote-left"></i> <span class="title">Messaggio: </span> <span class="content">{{$message->message}}</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <h4 class="text-center mpt-30">Non hai ancora nessun messaggio</h4>
        @endif
      </div>
    </div>
  </main>
@endsection
