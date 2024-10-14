<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_service');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Service $role): bool
    {
        return $user->can('view_service');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('manage_service');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Service $role): bool
    {
        return $user->can('manage_service');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Service $role): bool
    {
        return $user->can('manage_service');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('manage_service');
    }
}
