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



        $itemList = Permission::create(['name' => 'itemList']);
        $itemCreate = Permission::create(['name' => 'itemCreate']);
        $itemEdit = Permission::create(['name' => 'itemEdit']);
        $itemDelete = Permission::create(['name' => 'itemDelete']);
        $itemShow = Permission::create(['name' => 'itemShow']);
        $deleteItemImage = Permission::create(['name' => 'deleteItemImage']);


        // $userCreate=Permission::create(['name' => 'userCreate']);

        $admin->givePermissionTo([


            $itemList,
            $itemCreate,
            $itemEdit,
            $itemDelete,
            $itemShow,
            $deleteItemImage





        ]);


        $user->givePermissionTo([


            $itemList,
            // $itemCreate,
            // $itemEdit,
            // $itemDelete,
            $itemShow,
            // $deleteItemImage


        ]);
    }
}
