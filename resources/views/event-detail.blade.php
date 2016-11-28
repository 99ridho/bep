@extends('layout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif
    @if($status == 'not_found')
        <div class="alert alert-danger" role="alert">
            <h3>Event not found</h3>
        </div>
    @else
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Event Details</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><strong>Organizer</strong></td>
                                <td>{{ $event_detail->organizer->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Event Name</strong></td>
                                <td>{{ $event_detail->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{{ $event_detail->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Start Date</strong></td>
                                <td>{{ $event_detail->start_date }}</td>
                            </tr>
                            <tr>
                                <td><strong>End Date</strong></td>
                                <td>{{ $event_detail->end_date }}</td>
                            </tr>
                            <tr>
                                <td><strong>Max Participant</strong></td>
                                <td>{{ $event_detail->max_participant }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(Auth::check())
                    @if(strtotime($event_detail->end_date) > strtotime(date('Y-m-d')))
                        @if($event_detail->user_id != auth()->user()->id && auth()->user()->type_id != 4)
                            <div class="panel-footer clearfix">
                                <div class="pull-right">
                                    <a href="{{ route('register_to_event', ['id' => $event_detail->id]) }}" class="btn btn-success">Register to Event</a>
                                </div>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Rundowns</h3>
                </div>
                <div class="panel-body">
                    @if($event_detail->rundowns->count() == 0)
                        <div class="text-center"><h5>No Rundowns</h5></div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($event_detail->rundowns as $rundown)
                                        <tr>
                                            <td>{{ $rundown->name }}</td>
                                            <td>{{ $rundown->description }}</td>
                                            <td>{{ $rundown->start_date }}</td>
                                            <td>{{ $rundown->end_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::check())
            @if($event_detail->user_id == auth()->user()->id && auth()->user()->type_id == 4)
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Attendees</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                @if($attendees->count() == 0)
                                    <div class="text-center"><h5>No Attendees</h5></div>
                                @else
                                    @foreach($attendees as $a)
                                        <a href="{{ route('user_profile', [$a->user->username]) }}" class="list-group-item">
                                            {{ $a->user->name }}
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Winners</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @if($winners->count() == 0)
                            <div class="text-center"><h5>No Winners</h5></div>
                        @else
                            @foreach($winners as $w)
                                <a href="{{ route('user_profile', [$w->user->name]) }}" class="list-group-item">
                                    {{ $w->user->name }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Comments - ({{ $avg_rating }} avg. rating)</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @if($comments->count() == 0)
                            <div class="text-center"><h5>No Comments.</h5></div>
                        @else
                            @foreach($comments as $c)
                                <div class="list-group-item">
                                    <h4 class="list-group-item-heading">{{ $c->user->name }}</h4>
                                    <p class="list-group-item-text">{{ $c->comment }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(Auth::check())
                    <div class="panel-footer clearfix">
                        <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('save_comment', ['id' => $event_detail->id]) }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="event_id" value="{{ $event_detail->id }}">
                            <div class="form-group">
                                <div class="pull-left">
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                                            <input type="text" class="form-control" placeholder="write comment here..." name="comment" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                            <input type="number" min="0" max="5" class="form-control" placeholder="rating" name="rating" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <div class="input-group" style="margin: 0px auto;">
                                            <input type="submit" class="btn btn-info" value="Post Comment">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection