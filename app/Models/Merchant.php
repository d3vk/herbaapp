<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchat_name',
        'admin_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
