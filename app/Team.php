<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "team";

    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    public function athletes() {
    	return $this->hasMany(TeamAthlete::class);
    }
}
