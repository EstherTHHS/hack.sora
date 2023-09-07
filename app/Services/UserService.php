<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{


    public function storeUser($data)
    {
        $user = User::create($data);
        if (isset($data['role'])) {
            $user->assignRole($data['role']);
        }
        return $user;
    }


}
