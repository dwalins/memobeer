<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    protected $table = 'brewerys';

     /**
     * Get all of the beers for the brewery.
     */
    public function beers()
    {
        return $this->hasMany(Beer::class);
    }
}
