<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>@yield('title')</title>

    </head>
    <body>
      @include('include.header')
        <div class="container">
            @yield('content')
        </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js ')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/app.js') }}">

    </script>
    </body>
</html>
