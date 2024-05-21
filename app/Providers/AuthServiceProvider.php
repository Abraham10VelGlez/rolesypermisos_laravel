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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        
        //AQUI VAMOS A ACREAR LOS ROOLES DE USUARIOS
        Gate::define('seeallviews', function(User $user){
            return $user->role == User::ROLE_ADMINISTRADOR;
        });

        Gate::define('combo_n',function(User $user){
            return $user->role == User::ROLE_ADMINISTRADOR;
        });



        

        Gate::define('viewsdictamenes_cap',function(User $user){
            return $user->role == User::ROLE_CONTRIBUYENTE;
        });


       
    }
}
