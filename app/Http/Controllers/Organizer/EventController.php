<?php

namespace App\Http\Controllers\Organizer;

use App\Event;
use App\EventAttendee;
use App\EventRundown;
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

        return view('event-detail', ['status' => 'found', 'event_detail' => $event]);
    }

    public function indexAddWinner($id) {
        $attendee = EventAttendee::where('event_id', $id)->get();
        $event = Event::find($id);

        return view('organizer/add-event-winner', ['event' => $event, 'event_attendees' => $attendee]);
    }

    /* -- POST -- */

    public function addEvent(Request $request) {
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

}
