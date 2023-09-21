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
        $user->assignRole('User');
        return $user;
    }


    public function socialLogin($data)
    {

      return User::create($data);


    }


}
