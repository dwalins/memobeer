<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class BeerslistPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Beerslist $beerslist)
    {
        return $user->id === $beerslist->user_id;
    }
}
