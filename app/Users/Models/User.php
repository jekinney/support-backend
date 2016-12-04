<?php

namespace App\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function companyOwner()
    {
        return $this->hasMany(\App\Companies\Models\Company::class, 'id', 'owner_id');
    }

    public function companyUser()
    {
        return $this->belongsToMany(\App\Companies\Models\Company::class, 'company_user', 'user_id', 'company_id');
    }

    public function adminAccess()
    {
        return $this->belongsToMany(Admin::class, 'admin_user', 'user_id', 'admin_id');
    }


}
