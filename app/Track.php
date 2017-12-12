<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
	// Get album that track belongs to
    public function album(){
    	return $this->belongsTo('App\Album');
    }

    // Get artist that track belongs to
	public function artist(){
		return $this->belongsTo('App\Artist');
	}
}
