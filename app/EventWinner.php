<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventWinner extends Model
{
    //
    protected $table = "event_winner";

    protected $fillable = [
        'user_id', 'event_id', 'rank'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function winner() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
