<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "event";

    protected $fillable = [
        'user_id', 'name', 'description', 'start_date', 'end_date', 'max_participant'
    ];

    public function organizer() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attendees() {
        return $this->hasMany(EventAttendee::class);
    }

    public function winners() {
        return $this->hasMany(EventWinner::class);
    }

    public function rundowns() {
        return $this->hasMany(EventRundown::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
