<?php

namespace App\Site\Models;

use Illuminate\Database\Eloquent\Model;

class SiteRole extends Model
{
    protected $fillable = [
    	'slug', 
    	'name',
		'description'
	];

	public function sitePermissions()
	{
		return $this->belongsTomany(SitePermission::class, 'site_permission_role', 'site_permission_id', 'site_role_id');
	}

	public function users()
	{
		return $this->belongsToMany(\App\Users\Models\User::class, 'site_role_user', 'user_id', 'site_role_id');
	}
}
