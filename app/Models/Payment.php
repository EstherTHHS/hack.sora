<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'cart_id',
        'amount',
        'payment_date',
        'payment_method'
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
