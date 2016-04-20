<?php

namespace App\Policies;

use App\User;
use App\Beerslist;
use Illuminate\Auth\Access\HandlesAuthorization;

class BeerslistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given beer.
     *
     * @param  User  $user
     * @param  Beerslist  $beerslist
     * @return bool
     */
    public function destroy(User $user, Beerslist $beerslist)
    {
        return $user->id == $beerslist->user_id;
    }
}
