@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">

            @foreach ($messages as $message)
                <div class="col-md-3">
                  <div>
                      <p>Nome: {{$message->name}}</p>
                      <p>Cognome: {{$message->lastname}}</p>
                      <p>Indirizzo e-mail: {{$message->email}}</p>
                      <p>Messaggio: {{$message->message}}</p>
                  </div>
                </div>
            @endforeach

      </div>
    </div>
@endsection
