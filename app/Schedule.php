<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public static function get($id) {
        $u = User::where('username', $id)->first();

        if ($u == null)
            return null;

        $evt_attended = EventAttendee::where('user_id', $u->id)->get();

        return $evt_attended;
    }
}
