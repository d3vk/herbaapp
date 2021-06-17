<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'user_id',
        'address',
        'merchant_id',
        'status',
        'in_cart',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
