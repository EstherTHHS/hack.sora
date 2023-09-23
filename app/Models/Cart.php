<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_subscribe_id',
        'item_id',
        'quantity',
        'buy_date'
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function userSubscribe()
    {
        return $this->belongsTo(UserSubscribe::class, 'user_subscribe_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'cart_id');
    }
}
