<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    protected $table = "event_attendee";

    protected $fillable = [
        'event_id', 'user_id'
    ];

    protected function event() {
        return $this->belongsTo(Event::class);
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
