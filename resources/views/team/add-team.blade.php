@extends('layout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif
    @include('validation-errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add Team</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('team_save_new_team') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="Name" name="name" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="5" class="form-control" placeholder="Description" name="description" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-md-12 ">
                        <div class="input-group" style="margin: 0px auto;">
                            <input type="submit" class="btn btn-info" value="Add Team">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection