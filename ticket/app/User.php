<?php

namespace App;

use App\role; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class user extends Model
{
    //
    protected $fillable = ['first_name', 'last_name', 'country', 'club', 'email', 'password'];


    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    public function addRole($rolename)
    {
        $role = role::where('name', $rolename)->first();
        $this->roles()->attach($role->id);

    }

    public function hasRole($rolename)
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if (strtolower($role->name) == strtolower($rolename)) {
                return true;
            }
        }

    }
}
