<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubscribe extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'item_id',
        'type',
        'status'

    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_subscribe_id', 'id');
    }






}
