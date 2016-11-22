<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $table = 'rating';

    protected $fillable = [
        'event_id', 'user_id', 'rating'
    ];

    protected function user() {
        return $this->belongsTo(User::class);
    }

    protected function event() {
        return $this->belongsTo(Event::class);
    }
}
