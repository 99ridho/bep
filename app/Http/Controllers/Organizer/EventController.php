<?php

namespace App\Http\Controllers\Organizer;

use App\Event;
use App\EventRundown;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

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

        return redirect()->route('organizer_add_event')->with([
            'status'=>'success',
            'title'=> 'Success!!!',
            'message'=>'Add event rundown success'
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
