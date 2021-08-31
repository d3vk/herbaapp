<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaklonJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'worker_id',
        'status',
        'keterangan'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'worker_id', 'id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
