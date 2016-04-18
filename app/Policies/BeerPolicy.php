<?php

namespace App\Policies;

use App\User;
use App\Beer;
use Illuminate\Auth\Access\HandlesAuthorization;

class BeerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given beer.
     *
     * @param  User  $user
     * @param  Beer  $beer
     * @return bool
     */
    public function destroy(User $user, Beer $beer)
    {
        return $user->id === $beer->user_id;
    }
}
