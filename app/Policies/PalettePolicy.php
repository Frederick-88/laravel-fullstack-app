<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Palette;
use Illuminate\Auth\Access\HandlesAuthorization;

class PalettePolicy
{
    use HandlesAuthorization;

    public function authorized(User $user, Palette $palette)
    {
        return $user->id === $palette->user_id;
    }
}
