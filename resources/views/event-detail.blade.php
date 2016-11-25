@extends('layout')

@section('content')
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
                    @if($event_detail->user_id != auth()->user()->id && auth()->user()->type_id != 4)
                        <div class="panel-footer clearfix">
                            <div class="pull-right">
                                <a href="#" class="btn btn-success">Register to Event</a>
                            </div>
                        </div>
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
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Attendees</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Winners</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    @endif
@endsection