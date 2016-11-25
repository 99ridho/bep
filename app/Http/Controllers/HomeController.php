<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $today = date('Y-m-d');

        $past_events = Event::whereDate('end_date', '<', $today)->get();
        $ongoing_events = Event::whereDate('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->get();
        $next_events = Event::whereDate('start_date', '>', $today)->get();

        return view('home', ['past_events' => $past_events, 'ongoing_events' => $ongoing_events, 'next_events' => $next_events]);
    }
}
