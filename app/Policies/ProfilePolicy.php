<?php

namespace App\Policies;

use App\Models\Alumnus;
use App\Models\User;

class ProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Alumnus $alumnus)
    {
        return $user->alumnus->id === $alumnus->id;
    }
}
