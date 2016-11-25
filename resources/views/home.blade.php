@extends('layout')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ongoing Events</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($ongoing_events as $e)
                        <a href="{{ route('event_detail', ['id' => $e->id]) }}" class="list-group-item">{{ $e->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Next Events</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($next_events as $e)
                        <a href="{{ route('event_detail', ['id' => $e->id]) }}" class="list-group-item">{{ $e->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Past Events</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($past_events as $e)
                        <a href="{{ route('event_detail', ['id' => $e->id]) }}" class="list-group-item">{{ $e->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection