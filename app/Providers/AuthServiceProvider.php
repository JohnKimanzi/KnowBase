<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function (User $user) {
            return strtolower($user->role) == 'admin';
        });     
        Gate::define('isManager', function (User $user) {
            return strtolower($user->role) == 'manager' || strtolower($user->role) == 'admin';
        }); 
        Gate::define('isCandidate', function (User $user) {
            return strtolower($user->role) == 'candidate' || strtolower($user->role) == 'manager' || strtolower($user->role) == 'admin';
        }); 
    }
}
