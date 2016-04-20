<?php

namespace App;

use App\User;
use App\Beer;
use Illuminate\Database\Eloquent\Model;

class List extends Model
{
	/**
	* Get the user that owns the list.
	*/
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	/**
	* Get all of the beers for this list.
	*/
	public function lists()
	{
		return $this->hasMany(Beer::class);
	}
}
