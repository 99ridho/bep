<?php

namespace App\Http\Controllers;

use App\EventAttendee;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    // TODO : jadwal pertandingan yang diikuti...

    public function getSchedule($id) {
        return view('athlete/list-attended-event', ['attended_events' => Schedule::get($id)]);
    }
}
