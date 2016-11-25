@extends('layout')

@section('content')
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
                    <h3 class="panel-title">Change Profile</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('user_save_profile') }}">
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
                        <div class="form-group" >
                            <div class="col-md-12 ">
                                <div class="input-group" style="margin: 0px auto;">
                                    <input type="submit" class="btn btn-info" value="Change Profile">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection