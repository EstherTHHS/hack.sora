<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\User;
use App\Models\Project;
use App\Models\UserSubscribe;
use Illuminate\Support\Facades\DB;

class SubscribeService
{


    // public function subscribe($data)
    // {


    //     //    $userSubscribe= UserSubscribe::create([
    //     //         'user_id'=>$data['id'],
    //     //         'item_id'=>$data['item_id'],
    //     //         'type'=>$data['type'],
    //     //         'status'=>$data['status'],
    //     //     ]);


    //     foreach ($data['item_id'] as $item) {
    //         $userSubscribe = UserSubscribe::create([
    //             'user_id' => $data['user_id'],
    //             'item_id' => $item,
    //             'type' => $data['type'],
    //             'status' => $data['status'],
    //         ]);
    //     }

    //     foreach ($data['item_id'] as $item) {

    //         $cart = Cart::create([
    //             'user_subscribe_id' => $userSubscribe->id,
    //             'item_id' => $item,
    //             'quantity' => $data['quantity'],
    //             'buy_date' => $data['buy_date'],
    //         ]);
    //     }
    //     return $cart;
    // }




    public function subscribe($data)
    {
        return DB::transaction(function () use ($data) {
            $carts = [];

            foreach ($data['item_id'] as $item) {
                $userSubscribe = UserSubscribe::create([
                    'user_id' => $data['user_id'],
                    'item_id' => $item,
                    'type' => $data['type'],
                    'status' => $data['status'],
                ]);

                $cart = Cart::create([
                    'user_subscribe_id' => $userSubscribe->id,
                    'item_id' => $item,
                    'quantity' => $data['quantity'],
                    'buy_date' => $data['buy_date'],
                ]);

                $carts[] = $cart;
            }

            return $carts;
        });
    }


}
