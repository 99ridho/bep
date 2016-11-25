@extends('layout')

@section('content')
    <div class="row">
        <div class="pull-left">
            <h2>List Events</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('organizer_add_event') }}"><span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </div>
    <hr />
    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif
    <div class="row">
        @if($events->count() == 0)
            <div class="text-center">
                <h3>No Events.</h3>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Max Participant</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $e)
                        <tr>
                            <td>{{ $e->id }}</td>
                            <td>{{ $e->name }}</td>
                            <td>{{ $e->start_date }}</td>
                            <td>{{ $e->end_date }}</td>
                            <td>{{ $e->max_participant }}</td>
                            <td>
                                <a class="btn btn-default btn-sm" href="{{ route('event_detail', [$e->id]) }}"><span class="glyphicon glyphicon-info-sign"></span></a>
                                <a class="btn btn-info btn-sm" href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a class="btn btn-warning btn-sm" href="{{ route('organizer_add_rundown_event', [$e->id]) }}"><span class="glyphicon glyphicon-calendar"></span></a>
                                <a class="btn btn-warning btn-sm" href="{{ route('organizer_add_winner_event', [$e->id]) }}"><span class="glyphicon glyphicon-user"></span></a>
                                <a class="btn btn-danger btn-sm" href="{{ route('organizer_delete_event', [$e->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection