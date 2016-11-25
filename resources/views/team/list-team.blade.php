@extends('layout')

@section('content')
    <div class="row">
        <div class="pull-left">
            <h2>List Teams</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('team_add_team') }}"><span class="glyphicon glyphicon-plus"></span></a>
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
        @if($teams->count() == 0)
            <div class="text-center">
                <h3>No Teams.</h3>
            </div>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Athlete Count</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->athletes->count() }}</td>
                                <td>
                                    <a class="btn btn-default btn-sm" href="#"><span class="glyphicon glyphicon-info-sign"></span></a>
                                    <a class="btn btn-info btn-sm" href="{{ route('team_edit_team', [$item->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-user"></span></a>
                                    <a class="btn btn-danger btn-sm" href="#"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection