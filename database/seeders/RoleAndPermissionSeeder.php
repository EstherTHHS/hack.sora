<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);



        $projectList = Permission::create(['name' => 'projectList']);
        $projectCreate = Permission::create(['name' => 'projectCreate']);
        // $userCreate=Permission::create(['name' => 'userCreate']);

        $admin->givePermissionTo([


            $projectList,
            $projectCreate,




        ]);


        $user->givePermissionTo([


            $projectList,


        ]);
    }
}
