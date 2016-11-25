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
@include('headers.guest')
<div class="container-fluid">
    <div class="row" style="margin-top: 80px">
        <div class="col-md-offset-3 col-md-6">
            @if(Session::has('status'))
                <div class="alert alert-{{Session::get('status')}}" role="alert">
                    <strong>{{Session::get('title')}}</strong><br/>
                    <h5>{!! Session::get('message') !!}</h5>
                </div>
            @endif
            @include('validation-errors')
        </div>
        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('auth_register') }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="Username" name="username" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" class="form-control" placeholder="Password" name="password" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="Email" name="email" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control" placeholder="Name" name="name" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="input-group" style="width: 100%">
                                        <select class="form-control" name="type">
                                            <option value="-1">-- Select Account Type --</option>
                                            @foreach(App\Type::all() as $item)
                                                @if($item->id != 1)
                                                <option value="{{ $item->id }}">{{ $item
                                                 ->type }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <div class="col-md-12 ">
                                    <div class="input-group" style="margin: 0px auto;">
                                        <input type="submit" class="btn btn-info" value="Sign Up">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{url('assets/bs/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('assets/bs/js/bootstrap.min.js')}}"></script>
</body>
</html>