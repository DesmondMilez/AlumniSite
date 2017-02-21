<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer id
 * @property integer index
 * @property string name
 * @property string email
 * @property string surename
 * @property string password
 * @property bool is_admin
 * @property UserProfile Profile
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'index',
        'surename',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function advert()
    {
        return $this->hasOne(JobAdvert::class, 'admin_id');
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isStudent()
    {
        return !$this->is_admin;
    }
}
