<?php

namespace App\Companies\Models;

use Illuminate\Database\Eloquent\Model;

class ComapanyPermission extends Model
{
    protected $fillable = [
    	'slug', 
    	'name',
		'description'
	];

	public function companyRoles()
	{
		return $this->belongsToMany(companyRole::class, 'company_role_permission', 'company_permission_id', 'company_role_id');
	}
}
