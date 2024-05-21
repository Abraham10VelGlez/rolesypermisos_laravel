<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    //ROLES USEERS CREATED POR ABRAHAM
    const ROLE_ADMINISTRADOR = 10;
    const ROLE_ADMINISTRADORJR = 5;
    const ROLE_REVISOR = 3;
    const ROLE_ESPECIALISTA = 2;
    const ROLE_CONTRIBUYENTE = 1;
    const ROLE_MUNICIPIO = 6;
    const ROLE_USEREXTERNO = 7;
    const ROLE_USERINTERNOS = 8;

      // Puedes definir explícitamente el guard si es necesario
      protected $guard_name = 'web';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
