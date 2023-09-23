<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function getUsers()
    {
       return User::with('subscriptions')->get();

    }

    public function storeUser($data)
    {
        $user = User::create($data);
        $user->assignRole('User');
        return $user;
    }


    public function socialLogin($data)
    {

      $user= User::create($data);
      $user->assignRole('User');
      return $user;
    }


    public function userStatus($request,$id)
    {
        $user= User::where('id',$id)->first();


        $user->status = $user->status == 1 ? 0 : 1;
        $data = $user->save();
        return $data;
    }




}
