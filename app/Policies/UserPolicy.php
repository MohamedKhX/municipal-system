<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $employee): bool
    {
        return $user->can('view_user');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('manage_user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $employee): bool
    {
        return $user->can('manage_user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $employee): bool
    {
        return $user->can('manage_user');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('manage_user');
    }
}
