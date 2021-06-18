<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'method_id',
        'account'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }

    public function method()
    {
        return $this->belongsTo(Payment::class, 'method_id', 'id');
    }
}
