<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	// Get tracks that belong to an album
    public function track(){
    	return $this->hasMany('App\Track');
    }

    // Get artists that album belongs to
    public function artist(){
    	return $this->belongsToMany('App\Artist');
    }
}
