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
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'estado',
        'numdoc',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function adminlte_profile_url()
    {
        return 'profile';
    }

    protected $casts = [
        'estado' => 'boolean',
    ];
}
