<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\User;
use App\Models\Project;
use App\Models\UserSubscribe;
use Illuminate\Support\Facades\DB;

class SubscribeService
{

    public function subscribe($data)
    {
        return DB::transaction(function () use ($data) {
            $carts = [];

            foreach ($data['item_id'] as $key=>$item) {
                $status = is_null($data['type'][$key]) ? 0 : 1;
                $userSubscribe = UserSubscribe::create([
                    'user_id' => $data['user_id'],
                    'item_id' => $item,
                    'type' => $data['type'][$key],
                    'status' =>  $status,
                ]);

                $cart = Cart::create([
                    'user_subscribe_id' => $userSubscribe->id,
                    'item_id' => $item,
                    'quantity' => $data['quantity'][$key],
                    'buy_date' => $data['buy_date'],
                ]);

                $carts[] = $cart;
            }

            return $carts;
        });
    }

    // public function payment($data)
    // {

    // }
}
