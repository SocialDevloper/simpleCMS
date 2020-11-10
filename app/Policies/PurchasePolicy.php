<?php

namespace App\Policies;

use App\Purchase;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Auth\Access\Response;

class PurchasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Purchase  $purchase
     * @return mixed
     */
    public function view(User $user, Purchase $purchase)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $roles = $user->roles->pluck('name')->toArray();
        return in_array('Super Admin', $roles) ? Response::allow()
                : Response::deny('You do not own this post.');

        /* also write below this */       
        //return in_array('Super Admin', $roles) ? $this->allow(): $this->deny('You do not own this post.');         
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Purchase  $purchase
     * @return mixed
     */
    public function update(User $user, Purchase $purchase)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Purchase  $purchase
     * @return mixed
     */
    public function delete(User $user, Purchase $purchase)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Purchase  $purchase
     * @return mixed
     */
    public function restore(User $user, Purchase $purchase)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Purchase  $purchase
     * @return mixed
     */
    public function forceDelete(User $user, Purchase $purchase)
    {
        //
    }
}
