<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <div class="bla">
          @foreach($apartments as $apartment)
            <img src="{{$apartment->img}}" alt="{{$apartment->title}}">
          @endforeach
        </div>
    </body>
</html>
