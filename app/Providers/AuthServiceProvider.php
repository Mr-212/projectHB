<?php

namespace App\Providers;

use App\Constants\GeneralConstants;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {

            return $user->hasRole(GeneralConstants::SUPER_ADMIN) ? true : null;
        });
//
        Gate::after(function ($user, $ability) {
            return $user->hasRole(GeneralConstants::SUPER_ADMIN); // note this returns boolean
        });
    }
}
