<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
	// Get album that belongs to
    public function album(){
    	return $this->hasMany('App\Album');
    }

    // Get tracks corresponding
	public function track(){
		return $this->hasMany('App\Track');
	}
}
