<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'merchant_id',
        'price',
        'status',
        'short_description',
        'description',
        'good_for',
        'how_to',
        'ingredients',
        'is_active'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
