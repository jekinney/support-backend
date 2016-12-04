<?php

namespace App\Companies\Models;

use Illuminate\Database\Eloquent\Model;

class TeamPermission extends Model
{
    protected $fillable = [
    	'slug', 
    	'name',
		'description'
	];

	public function teamRoles()
	{
		return $this->belongsToMany(TeamPermission::class, 'team_role_permission', 'team_permission_id', 'team_role_id');
	}
}
