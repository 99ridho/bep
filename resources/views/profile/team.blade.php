@extends('layout')

@section('content')
    @if($status == 'not_found')
        <div class="alert alert-danger" role="alert">
            <h3>User not found</h3>
        </div>
    @else
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $data->username }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $data->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-tag"></span></span>
                                    <input type="text" class="form-control" placeholder="Type" name="type" value="{{ $data->type->type }}" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if(Auth::check())
                    @if(auth()->user()->username == $data->username)
                        <div class="panel-footer clearfix">
                            <div class="btn-group pull-right">
                                <div class="pull-right">
                                    <a class="btn btn-success">Change Profile</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    @endif
@endsection