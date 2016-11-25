<?php

namespace App\Http\Controllers\Organizer;

use App\Comment;
use App\Event;
use App\EventAttendee;
use App\EventRundown;
use App\Rating;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    /* -- GET -- */

    public function index() {
        //
    }

    public function manage() {
        $all = Event::all();
        return view('organizer/list-event', ['events' => $all]);
    }

    public function indexAddEvent() {
        return view('organizer/add-event');
    }

    public function indexAddRundown($id) {
        $event = Event::find($id);
        return view('organizer/add-rundown-event', ['event' => $event]);
    }

    public function indexEventDetail($id) {
        $event = Event::find($id);

        if ($event == null)
            return view('event-detail', ['status' => 'not_found']);

        $comments = Comment::where('event_id', $id)->get();
        $ratings = Rating::where('event_id', $id)->get();

        $sum = 0;

        foreach ($ratings as $r) {
            $sum += $r->rating;
        }

        return view('event-detail', ['status' => 'found', 'event_detail' => $event, 'comments' => $comments, 'avg_rating' => ($ratings->count() != 0) ? sprintf('%.1f', $sum / $ratings->count()) : '0.0']);
    }

    public function indexAddWinner($id) {
        $attendee = EventAttendee::where('event_id', $id)->get();
        $event = Event::find($id);

        return view('organizer/add-event-winner', ['event' => $event, 'event_attendees' => $attendee]);
    }

    /* -- POST -- */

    public function addEvent(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'max_participant' => 'required'
        ]);

        $new_event = Event::create([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'max_participant' => $request->input('max_participant')
        ]);

        return redirect()->route('organizer_add_event')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Add event success'
        ]);
    }

    public function inputEventRundown(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $new_rundown = EventRundown::create([
            'event_id' => $request->input('event_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);

        return redirect()->route('organizer_add_rundown_event')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Add event rundown success'
        ]);
    }

    public function inputEventWinner(Request $request) {
        $this->validate($request, [
            'user_id' => 'required',
            'rank' => 'required'
        ]);

        $new_rundown = EventWinner::create([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('winner'),
            'rank' => $request->input('rank')
        ]);

        return redirect()->route('organizer_add_winner_event')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Add event winner success'
        ]);
    }

    public function deleteEvent($id) {
        Event::destroy($id);

        return redirect()->route('organizer_manage_event')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Delete event success'
        ]);;
    }

    public function registerToEvent($id) {
        $attendee_check = EventAttendee::where('event_id', $id)
            ->where('user_id', auth()->user()->id)->first();
        $attendee_count = EventAttendee::where('event_id', $id)->count();

        if ($attendee_count == Event::find($id)->max_participant)
            return redirect()->route('event_detail', ['id' => $id])->with([
                'status'=>'danger',
                'title'=> 'Failed!!!',
                'message'=>'Event full!'
            ]);

        if ($attendee_check != null)
            return redirect()->route('event_detail', ['id' => $id])->with([
                'status'=>'danger',
                'title'=> 'Failed!!!',
                'message'=>'You\'re already registered to event'
            ]);

        $ins_attendee = EventAttendee::create([
           'user_id' => auth()->user()->id,
           'event_id' => $id
        ]);

        return redirect()->route('event_detail', ['id' => $id])->with([
            'status'=>'success',
            'title'=> 'Failed!!!',
            'message'=>'Success registered to event'
        ]);
    }

}
