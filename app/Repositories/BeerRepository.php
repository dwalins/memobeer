<?php

namespace App\Repositories;

use App\User;
use App\Beer;

class BeerRepository
{
    /**
     * Get all of the beers for a given user.
     *
     * @param  Beerslist  $beerslist
     * @return Collection
     */
    public function forList(Beerslist $beerslist)
    {
        return Beer::where('beerslist_id', $beerslist->id)
                    ->get();
    }
}
