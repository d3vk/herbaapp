<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id',
        'logo',
        'address',
        'phone',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->hasMany(MerchantPayment::class, 'merchant_id', 'id');
    }
}
