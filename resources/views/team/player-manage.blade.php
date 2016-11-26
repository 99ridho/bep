@extends('layout')

@section('content')
    <div class="row">
        <div class="pull-left">
            <h2>List Athlete</h2>
        </div>
    </div>
    <hr />
    @if(Session::has('status'))
        <div class="alert alert-{{Session::get('status')}}" role="alert">
            <strong>{{Session::get('title')}}</strong><br/>
            <h5>{!! Session::get('message') !!}</h5>
        </div>
    @endif
    @include('validation-errors')
    <div class="row">
        @if($athletes->count() == 0)
            <div class="text-center">
                <h3>No Athletes.</h3>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($athletes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('list_attended_event', [$item->user->username]) }}"><span class="glyphicon glyphicon-calendar"></span></a>
                                <a class="btn btn-danger btn-sm" href="{{ route('team_delete_athlete', ['athlete_id'=>$item->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection