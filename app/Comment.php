<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';

    protected $fillable = [
        'event_id', 'user_id', 'comment'
    ];

    protected function user() {
        return $this->belongsTo(User::class);
    }

    protected function event() {
        return $this->belongsTo(Event::class);
    }
}
