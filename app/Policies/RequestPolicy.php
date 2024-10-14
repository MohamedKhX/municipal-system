<?php

namespace App\Policies;

use App\Models\Request;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_request');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Request $request): bool
    {
        return $user->can('view_request');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('manage_request');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Request $request): bool
    {
        return $user->can('manage_request');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Request $request): bool
    {
        return $user->can('manage_request');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('manage_request');
    }
}
