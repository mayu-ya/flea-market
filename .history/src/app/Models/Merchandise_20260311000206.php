<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'merchandise_name',
        'brand_name',
        'price',
        'explanation',
        'condition'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function details()
    {
        return $this->belongsToMany(Category::class);
    }

    public function is_liked_by_auth_user()
    {
        if (!Auth::check()) {
            return false;
        }

        $profileId = Auth::user()->profile->id;

        return $this->likes->contains('profile_id', $profileId);
    }
}
