<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //Admin Page
        Gate::define('manage-users', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('manage-games', function (User $user) {
            return $user->is_admin ||  $user->is_dev;
        });

        Gate::define('manage-category', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('send-notifications', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('developer-register', function (User $user) {
            return !$user->is_dev;//só pode registrar se não for desenvolvedor
        });
    }
}
