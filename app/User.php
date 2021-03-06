<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'social_id',
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

    

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    /**
     * kiem tra xem nguoi dung co thuc hien 1 hanh dong nao do hay k
     */
    public function hasAccess(array $permission) : bool
    {
        foreach ($this->roles as $role) {
            if($role->hasAccess($permission)) {
                return true;
            }
        }
        return false;
    }

    /**
     * kiem tra xem nguoi dung co thuoc ve chuc danh nao do hay k
     */
    public function inRole()
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
