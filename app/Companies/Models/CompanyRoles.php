<?php

namespace App\Companies\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRoles extends Model
{
    protected $fillable = [
    	'slug', 
    	'name',
		'description'
	];

	public function companyPermissions()
	{
		return $this->belongsToMany(CompanyPermission::class, 'company_role_permission', 'company_permission_id', 'company_role_id');
	}

	public function users()
	{
		return $this->belongsToMany(\App\Users\Models\User::class, 'company_role_user', 'user_id', 'company_role_id');
	}
}
