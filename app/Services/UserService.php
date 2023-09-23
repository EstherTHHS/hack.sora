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

        $user->subscriptions()->sync($data['user_id']);

        return $user;
    }


    public function socialLogin($data)
    {

      $user= User::create($data);
      $user->assignRole('User');
      return $user;
    }


}
