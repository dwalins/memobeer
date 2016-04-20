<?php

namespace App\Repositories;

use App\User;
use App\Beerslist;

class BeerslistRepository
{
    /**
     * Get all of the lists for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Beerslist::where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
}
