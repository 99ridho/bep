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
            <h3 class="panel-title">Edit Event</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="margin-bottom: 0px;" method="POST" action="{{ route('organizer_save_edit_event', ['id' => $event->id]) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="id" value="{{ $event->id }}">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $event->name }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <textarea rows="5" class="form-control" placeholder="Description" name="description">{{ $event->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input id="start-date-datepicker"data-format="yyyy-MM-dd hh:mm:ss" type="text" class="form-control form-date" placeholder="Start Date" name="start_date" value="{{ $event->start_date }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input id="end-date-datepicker" data-format="yyyy-MM-dd hh:mm:ss" type="text" class="form-control" placeholder="End Date" name="end_date" value="{{ $event->end_date }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
                            <input type="number" class="form-control" placeholder="Max Participant" name="max_participant" value="{{ $event->max_participant }}">
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-md-12 ">
                        <div class="input-group" style="margin: 0px auto;">
                            <input type="submit" class="btn btn-info" value="Edit Event">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            $('#end-date-datepicker').datetimepicker();
            $('#start-date-datepicker').datetimepicker();
        });
    </script>
@endsection