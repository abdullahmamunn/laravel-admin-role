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

                [
                    'group_name' => 'dashboard',
                    'permissions' => [
                        'dashboard.view',
                        'dashboard.edit',
                    ]
                ],
                [
                    'group_name' => 'blog',
                    'permissions' => [
                        'blog.create',
                        'blog.view',
                        'blog.edit',
                        'blog.delete',
                        'blog.approve',
                    ]
                ],
                [
                    'group_name' => 'admin',
                    'permissions' => [
                        'admin.create',
                        'admin.view',
                        'admin.edit',
                        'admin.delete',
                        'admin.approve',
                    ]
                ],
                [
                    'group_name' => 'role',
                    'permissions' => [
                        'role.create',
                        'role.view',
                        'role.edit',
                        'role.delete',
                        'role.approve',
                    ]
                ],
                [
                    'group_name' => 'profile',
                    'permissions' => [
                        'profile.view',
                        'profile.edit',
                    ]
                ],
               
            ];

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $super_admin->givePermissionTo($permission);
                $permission->assignRole($super_admin);
            }
        }
    }
}
