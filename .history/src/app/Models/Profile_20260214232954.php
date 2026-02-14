<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchandise_id',
        'profile_img',
        'name',
        'post_code',
        'address',
        'building'
    ];
}
