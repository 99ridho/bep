<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamAthlete extends Model
{
    //
	protected $table = "team_member";

	protected $fillable = [
		'team_id', 'user_id'
	];

	public function team() {
		return $this->belongsTo(Team::class);
	}

	public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
