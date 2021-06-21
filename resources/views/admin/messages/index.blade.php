@extends('layouts.app')
@section('content')
    <div>
        @foreach (Auth::user()->apartments as $apartment)
            @foreach ($apartment->messages as $message)
                <div>
                    <p>{{$message->name}}</p>
                    <p>{{$message->lastname}}</p>
                    <p>{{$message->email}}</p>
                    <p>{{$message->message}}</p>
                </div>
            @endforeach 
        @endforeach
    </div>
@endsection