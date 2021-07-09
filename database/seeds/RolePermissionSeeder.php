<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $super_admin = Role::create(['name' => 'superadmin']);
        $admin       = Role::create(['name' => 'admin']);
        $editor      = Role::create(['name' => 'editor']);
        $user        = Role::create(['name' => 'user']);

        //permissoins list
        $permissions = [
           'dashboard.view',

           'blog.create',
           'blog.view',
           'blog.edit',
           'blog.delete',
           'blog.aprove',

           'admin.create',
           'admin.view',
           'admin.edit',
           'admin.delete',
           'admin.aprove',

           'role.create',
           'role.view',
           'role.edit',
           'role.delete',
           'role.aprove',

           'profile.view',
           'profile.edit',
        ];

        foreach ($permissions as $permission) {
        	$create_permission = Permission::create(['name' => $permission]);
        	$super_admin->givePermissionTo($create_permission);
            $create_permission->assignRole($super_admin);
        }
    }
}
