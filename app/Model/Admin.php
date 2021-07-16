<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
class Admin extends Authenticatable
{
      use Notifiable, HasRoles;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public static function groupname(){
        $group_name = Permission::distinct()->groupBy('group_name')->get(['group_name as name']);
        // $group_name = Permission::select('group_name as name')->distinct()->get();
        // $group_name = Permission::select('group_name as name')->groupBy('group_name')->get()->toArray();
        return $group_name;
    }
    public static function permissionsByGroupName($group_name){
        $permissions = Permission::where('group_name', $group_name)->get();
        return $permissions;
    }
    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }
}
