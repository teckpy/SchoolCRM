<?php

namespace App\Providers;

use App\Models\Admin;
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
        Gate::define('isAdmin', function ($user) {

            if ($user->approved_at) {
                foreach ($user->roles as $role) {
                    if ($role->role === 'Admin') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        });

        Gate::define('isTeacher', function ($user) {

            if ($user->approved_at) {
                foreach ($user->roles as $role) {
                    if ($role->role === 'Teacher') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        });

        Gate::define('isStudent', function ($user) {

            if ($user->approved_at) {
                foreach ($user->roles as $role) {
                    if ($role->role === 'Student') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        });
    }
}
