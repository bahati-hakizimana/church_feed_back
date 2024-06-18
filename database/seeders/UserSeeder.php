<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $user_list = Permission::create(['name' => 'users.List']);
        $user_view = Permission::create(['name' => 'users.view']);
        $user_create = Permission::create(['name' => 'users.create']);
        $user_update = Permission::create(['name' => 'users.update']);
        $user_delete = Permission::create(['name' => 'users.delete']);



        $admin_role = Role::create(['name' => 'admin']);
        $admin_role->givePermissionTo([
            $user_create,
            $user_list,
            $user_update,
            $user_view,
            $user_delete
        ]);
        

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole($admin_role);
        $admin->givePermissionTo([

            $user_create,
            $user_list,
            $user_update,
            $user_view,
            $user_delete

        ]);


        //user

        $user_role = Role::create(['name' => 'user']);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole($user_role);
        $user->givePermissionTo([

            // $user_create,
            $user_list,
            // $user_update,
            // $user_view,
            // $user_delete

        ]);
    }
}
