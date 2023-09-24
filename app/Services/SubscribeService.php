<?php

namespace App\Services;

use Exception;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\UserSubscribe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Request;

class SubscribeService
{

   public function subscribe($datas)
{

    return DB::transaction(function () use ($datas) {
        $carts = [];

        foreach ($datas as $data) {
            $status = is_null($data['type']) ? 0 : 1;

            $userSubscribe = UserSubscribe::create([
                'user_id' => $data['user_id'],
                'item_id' => $data['item_id'],
                'type' => $data['type'],
                'status' => $status,
                'is_complete' => 1
            ]);

            $cart = Cart::create([
                'user_subscribe_id' => $userSubscribe->id,
                'quantity' => $data['quantity'],
                'buy_date' => $data['buy_date'],
            ]);

            $carts[] = $cart;

            Payment::create([
                'subscribe_user_id' => $data['user_id'],
                'amount' => $data['amount'],
                'payment_date' => $data['buy_date'],
                'payment_method' => $data['payment_method'],
            ]);
        }

        return $carts;
    });
}




    // public function subscribe(array $data)
    // {

    //     return DB::transaction(function () use ($data) {
    //         $carts = [];

    //         foreach ($data['item_id'] as $key => $item) {
    //             $status = is_null($data['type'][$key]) ? 0 : 1;

    //             $userSubscribe = UserSubscribe::create([
    //                 'user_id' => $data['user_id'],
    //                 'item_id' => $item,
    //                 'type' => $data['type'][$key],
    //                 'status' => $status,
    //                 'is_complete' => 1
    //             ]);

    //             $cart = Cart::create([
    //                 'user_subscribe_id' => $userSubscribe->id,
    //                 'quantity' => $data['quantity'][$key],
    //                 'buy_date' => $data['buy_date'],
    //             ]);

    //             $carts[] = $cart;
    //         }

    //         Payment::create([
    //             'subscribe_user_id' => $data['user_id'],
    //             'amount' => $data['amount'],
    //             'payment_date' => $data['buy_date'],
    //             'payment_method' => $data['payment_method'],
    //         ]);

    //         return $carts;
    //     });
    // }


    public function subscribePayment($data, $userId)
    {
        $carts = [];

        foreach ($data['data'] as $item) {
            $status = is_null($item['type']) ? 0 : 1;

            $userSubscribe = UserSubscribe::create([
                'user_id' => $userId,
                'item_id' => $item['item'],
                'type' => $item['type'],
                'status' => $status,
                'is_complete' => 1
            ]);

            $cart = Cart::create([
                'user_subscribe_id' => $userSubscribe->id,
                'quantity' => $item['quantity'],
                'buy_date' => $data['buy_date'],
            ]);

            $carts[] = $cart;


        }

        Payment::create([
            'subscribe_user_id' => $userId,
            'amount' => $data['amount'],
            'payment_date' => $data['buy_date'],
            'payment_method' => $data['payment_method'],
        ]);

        return $carts;
    }








    // public function subscribePayment(array $data, $userId)
    // {
    //     try {
    //         return DB::transaction(function () use ($data, $userId) {
    //             $carts = [];

    //             foreach ($data as $item) {
    //                 $status = is_null($item['type']) ? 0 : 1;

    //                 $userSubscribe = UserSubscribe::create([
    //                     'user_id' => $userId,
    //                     'item_id' => $item['item_id'],
    //                     'type' => $item['type'],
    //                     'status' => $status,
    //                     'is_complete' => 1
    //                 ]);

    //                 $cart = Cart::create([
    //                     'user_subscribe_id' => $userSubscribe->id,
    //                     'quantity' => $item['quantity'],
    //                     'buy_date' => $item['buy_date'],
    //                 ]);

    //                 $carts[] = $cart;

    //                 Payment::create([
    //                     'subscribe_user_id' => $userId,
    //                     'amount' => $item['amount'],
    //                     'payment_date' => $item['buy_date'],
    //                     'payment_method' => $item['payment_method'],
    //                 ]);
    //             }

    //             return $carts;
    //         });
    //     } catch (Exception $e) {

    //         DB::rollBack();
    //         throw $e;
    //     }
    // }

}



