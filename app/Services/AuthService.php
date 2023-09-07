<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{


    public function register($validatedData)
    {

        $data = array_merge($validatedData, ['password' => Hash::make($validatedData['password'])]);

        $user =  User::create($validatedData);
        $user->assignRole($data['role']);
        return $user;
    }



    // public function login( $validatedData)
    // {



    //     if(Auth::attempt(['email' =>  $validatedData->email, 'password' =>  $validatedData->password])){
    //         // $user = User::where('email', $validatedData->email)->first();
    //         $user = Auth::user();
    //         $success['token'] =  $user->createToken('User Token')->plainTextToken;
    //         $success['name'] =  $user->name;
    //         $success['role'] = $user->getRoleNames();
    //         $success['permission'] = $user->getPermissionViaRoles()->pluck('name');

    //        return $success;
    //     }
    //     else{
    //         // return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    //     }
    // }


//     public function login($validatedData)
// {
//     if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
//         $user = Auth::user();
//         $success['token'] = $user->createToken('User Token')->plainTextToken;
//         $success['name'] = $user->name;
//         $success['role'] = $user->getRoleNames();
//         $success['permission'] = $user->getPermissionViaRoles()->pluck('name');

//         return $success;
//     } else {
//         // Handle authentication failure here
//     }
// }

}


