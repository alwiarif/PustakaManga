<?php

namespace App\Providers;

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

        Gate::define('dashboard', function($user){
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
            });

        Gate::define('manage-manga', function($user){
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
            });

        Gate::define('manage-genre', function($user){
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
            });

        Gate::define('manage-chapter', function($user){
            return count(array_intersect(["ADMIN"], json_decode($user->roles)));
            });
    }
}
