<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'image',
        'merchandise_name',
        'brand_name',
        'price',
        'explanation',
        'condition'
    ];
}
