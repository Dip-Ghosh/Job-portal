<?php

namespace App\Policies;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Organization $organization)
    {
        return $user->is_admin == 1;
    }

    public function create(User $user)
    {
        return $user->is_admin == 1;
    }

    public function update(User $user, Organization $organization)
    {
        return $user->is_admin == 1;
    }

    public function delete(User $user, Organization $organization)
    {
        return $user->is_admin == 1;
    }
}
