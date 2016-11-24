<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRundown extends Model
{
    protected $table = "event_rundown";

    protected $fillable = [
        'event_id', 'name', 'description', 'start_date', 'end_date'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
