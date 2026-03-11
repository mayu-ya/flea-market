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

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'merchandise_id');
    }

    public function details()
    {
        return $this->belongsToMany(Category::class, 'details');
    }

    public function is_liked_by_auth_user()
    {
        if (!Auth::check()) {
            return false;
        }

        $profileId = Auth::user()->profiles->id;

        return $this->likes->contains('profile_id', $profileId);
    }
}
