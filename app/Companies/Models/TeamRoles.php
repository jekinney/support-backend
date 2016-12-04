<?php

namespace App\Companies\Models;

use Illuminate\Database\Eloquent\Model;

class TeamRoles extends Model
{
    protected $fillable = [
    	'slug', 
    	'name',
		'description'
	];

	public function teamPermissions()
	{
		return $this->belongsToMany(TeamPermission::class, 'team_role_permission', 'team_permission_id', 'team_role_id');
	}

	public function users()
	{
		return $this->belongsToMany(\App\Users\Models\User::class, 'team_role_user', 'user_id', 'team_role_id');
	}
}
