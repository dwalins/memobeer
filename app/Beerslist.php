<?php

namespace App;

use App\User;
use App\Beer;
use Illuminate\Database\Eloquent\Model;

class Beerslist extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('name', 'color');
    //protected $fillable = array('username', 'email', 'password');

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
	public function beers()
	{
		return $this->belongsToMany('App\Beer', 'beer_beerslist');
	}
}
