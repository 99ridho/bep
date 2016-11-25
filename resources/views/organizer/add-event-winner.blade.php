@extends('layout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add Event Winner</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('organizer_save_new_winner_event', [$event->id]) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="event_id" name="event_id_dis" value="{{ $event->id }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="event_name" name="event_name_dis" value="{{ $event->name }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group" style="width: 100%">
                            <select class="form-control" name="winner">
                                <option value="-1">-- Select Attendee --</option>
                                @foreach($event_attendees as $item)
                                    <option value="{{ $item->user_id }}">{{ $item
                                             ->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" rows="5" class="form-control" placeholder="Rank" name="rank" >
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-md-12 ">
                        <div class="input-group" style="margin: 0px auto;">
                            <input type="submit" class="btn btn-info" value="Add Winner">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection