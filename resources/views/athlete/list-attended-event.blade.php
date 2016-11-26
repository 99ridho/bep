@extends('layout')

@section('content')
    <div class="row">
        <div class="pull-left">
            <h2>List Attended Events</h2>
        </div>
    </div>
    <hr />
    <div class="row">
        @if($attended_events == null)
            <div class="text-center">
                <h3>No Attened Events.</h3>
            </div>
        @elseif($attended_events->count() == 0)
            <div class="text-center">
                <h3>No Attened Events.</h3>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Event Start Date</th>
                        <th>Event End Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attended_events as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->event->name }}</td>
                            <td>{{ $item->event->start_date }}</td>
                            <td>{{ $item->event->end_date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection