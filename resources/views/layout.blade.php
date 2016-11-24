<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('assets/bs/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/semantic.min.css')}}">
    <title>BEP</title>
</head>
<body>
    @if(!Auth::check())
        @include('headers.guest')
    @else
        @if(auth()->user()->type->id == 2)
            @include('headers.team')
        @elseif(auth()->user()->type->id == 3)
            @include('headers.athlete')
        @elseif(auth()->user()->type->id == 4)
            @include('headers.penyelenggara')
        @endif
    @endif
    <div class="container-fluid">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-offset-1 col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{url('assets/bs/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/bs/js/bootstrap.min.js')}}"></script>
</body>
</html>