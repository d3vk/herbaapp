<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'id',
        'name',
        'profile',
        'logo',
        'phone',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
