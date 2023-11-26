<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
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

        Gate::define('admin', function ($admin) {
            return ($admin->role_id == 1) ? Response::allow() : Response::deny('Conteudo permitido somente para administratores.');
         });

         Gate::define('secretaria', function ($admin) {
             return ($admin->role_id == 2) ? Response::allow() : Response::deny('Conteudo permitido somente para secretaria.');
         });


    }
}
