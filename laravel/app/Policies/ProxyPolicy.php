<?php

namespace App\Policies;

use App\Models\Proxy;
use App\Models\User;


class ProxyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Proxy $product): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email==='boriswild@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Proxy $product): bool
    {
        return $user->email==='boriswild@gmail.com';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Proxy $product): bool
    {
        return $user->email==='boriswild@gmail.com';
    }
  /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->email==='boriswild@gmail.com';
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Proxy $product): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Proxy $product): bool
    {
        return false;
    }

     /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return false;
    }
}
