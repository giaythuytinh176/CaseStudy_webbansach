<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
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
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('page-user-admin', function ($user) {
            return $user->admin == 1;
        });
        Gate::define('delete-yourself', function ($user, $id) {
            return $user->id == $id;
        });

        Gate::resource('user', UserPolicy::class);
        //Gate::define('user.view', UserPolicy::class . '@viewAny');
    }
}
