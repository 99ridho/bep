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
            <h3 class="panel-title">Edit Team</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('team_save_edited_team', [$team->id]) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="team_id" value="{{ $team->id }}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $team->name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="5" class="form-control" placeholder="Description" name="description" >{{ $team->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-md-12 ">
                        <div class="input-group" style="margin: 0px auto;">
                            <input type="submit" class="btn btn-info" value="Edit Team">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add Athlete</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('team_save_player_to_team', [$team->id]) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="team_id" value="{{ $team->id }}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group" style="width: 100%">
                            <select class="form-control" name="athlete">
                                <option value="-1">-- Select Athletes --</option>
                                @foreach($athletes as $item)
                                    <option value="{{ $item->id }}">{{ $item
                                             ->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-md-12 ">
                        <div class="input-group" style="margin: 0px auto;">
                            <input type="submit" class="btn btn-info" value="Add Athlete">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection