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
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('auth_change_password') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" class="form-control" placeholder="Old Password" name="old_password" >
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
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" class="form-control" placeholder="Repeat Password" name="repeat_password" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="col-md-12 ">
                                <div class="input-group" style="margin: 0px auto;">
                                    <input type="submit" class="btn btn-info" value="Change Password">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection