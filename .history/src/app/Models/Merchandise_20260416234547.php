<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'merchandise_id');
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)) {
            $query->where('merchandise_name', 'like', '%' . $keyword . '%');
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'details');
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
