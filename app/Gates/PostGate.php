<?php

namespace App\Gates;
use Illuminate\Auth\Access\Response;

class PostGate
{
	public function deletePurchase($user)
	{
		$roles = $user->roles->pluck('name')->toArray();
        return in_array('Super Admin', $roles) ? Response::allow()
                : Response::deny('You are not Authorized to delete this purchase record.');
	}

	public function editPurchase($user)
	{
		$roles = $user->roles->pluck('name')->toArray();
        return in_array('Super Admin', $roles) ? Response::allow()
                : Response::deny('You are not Authorized to edit this purchase record.');
	}
}

