<?php

namespace App\Policies;

use App\Models\ProxyModel;
use App\Models\User;


class ProxyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProxyModel $product): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProxyModel $product): bool
    {
        return $user->email==='boriswild@gmail.com';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProxyModel $product): bool
    {
        return $user->email==='boriswild@gmail.com';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProxyModel $product): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProxyModel $product): bool
    {
        return false;
    }
}
