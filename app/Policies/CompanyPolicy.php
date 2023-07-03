<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;

class CompanyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Vacancy $vacancy)
    {
        return $user->id === $vacancy->user_id;
    }
}
