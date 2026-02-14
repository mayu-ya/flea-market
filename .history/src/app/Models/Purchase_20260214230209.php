<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'merchandise_id',
        'pay'
    ];

    public function profile()
    {
        return $this->belongTo(profile::class);
    }

    public function merchandise()
    {
        return $this->belongTo(merchandise::class);
    }
}
