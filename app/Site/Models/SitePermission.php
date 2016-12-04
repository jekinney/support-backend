<?php

namespace App\Site\Models;

use Illuminate\Database\Eloquent\Model;

class SitePermission extends Model
{
    protected $fillable = [
    	'slug', 
    	'name',
		'description'
	];

	public function siteRoles()
	{
		return $this->belongsToMany(SiteRole::class, 'site_permission_role', 'site_role_id', 'site_permission_id');
	}
}
