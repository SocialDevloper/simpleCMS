<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*---simple Gate----*/

        Gate::define('isAdmin', function ($user) {
            $roles = $user->roles->pluck('name')->toArray();
            return in_array('Admin', $roles);
        });

        // Super Admin Gate  for view ma use mate edit/delete functionality
        Gate::define('isSuperAdmin', function ($user) {
            $roles = $user->roles->pluck('name')->toArray();
            return in_array('Super Admin', $roles);
        });

        /*--- end----*/

        /*---Parameter Gate----*/
        /*Gate::define('isAllowed', function ($user, $allowed) {
            $allowed = explode(":", $allowed);
            $roles = $user->roles->pluck('name')->toArray();
            return array_intersect($allowed, $roles);
        });*/
        /*---end-----*/

        /* parameter in view User.index.blade.php (login user ne jetala role hoy tetla role wada user ne edit delete kari sakase login thyelo user)*/

        Gate::define('checkUser', function ($user, $allowedroles) {

            $allowedroles = $allowedroles->pluck('name')->toArray();
            $roles = $user->roles->pluck('name')->toArray();
            return array_intersect($allowedroles, $roles);
        });

        /* --class create for Delete & Edit Purchase Record  */
        Gate::define('delete-purchase', 'App\Gates\PostGate@deletePurchase');
        Gate::define('edit-purchase', 'App\Gates\PostGate@editPurchase');
    }
}
