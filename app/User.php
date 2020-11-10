<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserProfile;
use App\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one to one
    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    // Many To Many 
    public function roles()
    {
        return $this->belongsToMany(Role::class);

        //return $this->belongsToMany(Role::class, 'role_user', 'user_id','role_id', 'id', 'id');
    }
}
